<?php

declare(strict_types=1);

namespace AUS\RedirectComments\Xclass\Redirects\Repository;

use Override;
use PDO;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Redirects\Repository\Demand;

final class RedirectRepository extends \TYPO3\CMS\Redirects\Repository\RedirectRepository
{
    /**
     * Prepares the QueryBuilder with Constraints from the Demand
     */
    #[Override]
    protected function getQueryBuilderForDemand(Demand $demand, bool $createCountQuery = false): QueryBuilder
    {
        $queryBuilder = parent::getQueryBuilderForDemand($demand, $createCountQuery);
        $comment = self::getComment();
        if ($comment) {
            $escapedLikeString = '%' . $queryBuilder->escapeLikeWildcards($comment) . '%';
            $constraint = $queryBuilder->expr()->like(
                'comment',
                $queryBuilder->createNamedParameter($escapedLikeString, PDO::PARAM_STR)
            );
            $queryBuilder->andWhere($constraint);
        }

        return $queryBuilder;
    }

    public static function getComment(?ServerRequestInterface $serverRequest = null): string
    {
        $serverRequest ??= $GLOBALS['TYPO3_REQUEST'];
        $comment = $serverRequest->getParsedBody()['demand']['comment'] ?? '';
        return trim((string) $comment);
    }
}

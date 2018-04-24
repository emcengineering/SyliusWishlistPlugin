<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusWishlistPlugin\Repository;

use BitBag\SyliusWishlistPlugin\Entity\WishlistInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ShopUserInterface;

class WishlistRepository extends EntityRepository implements WishlistRepositoryInterface
{
    public function findByShopUser(ShopUserInterface $shopUser): ?WishlistInterface
    {
        return $this->createQueryBuilder('o')
            ->where('o.user = :shopUser')
            ->setParameter('shopUser', $shopUser)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}

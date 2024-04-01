<?php
/**
 * Template part for primary navigation
 *
 * @link https://developer.wordpress.org/reference/functions/wp_get_nav_menu_items/
 *
 * @package Bēsu
 */

 $navigation = \Log1x\Navi\Navi::make()->build('menu-1');
 ?>

<?php if ( $navigation->isNotEmpty() ) : ?>
    <nav id="site-navigation" class="main-navigation">
        <ul id="primary-menu">
            <?php foreach ( $navigation->toArray() as $item ) : ?>
                <li class="<?php echo $item->classes; ?> <?php echo $item->active ? 'current-item' : ''; ?>">
                    <a href="<?php echo $item->url; ?>">
                        <?php echo $item->label; ?>
                    </a>

                    <?php if ( $item->children ) : ?>
                        <ul >
                            <?php foreach ( $item->children as $child ) : ?>
                                <li class="<?php echo $child->classes; ?> <?php echo $child->active ? 'current-item' : ''; ?>">
                                    <a href="<?php echo $child->url; ?>">
                                        <?php echo $child->label; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
<?php endif; ?>

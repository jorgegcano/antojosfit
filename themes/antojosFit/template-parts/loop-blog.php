
                <li class="card card-blog">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('mediano'); ?>
                    <?php the_category(); ?>
                    <div class="contenido">
                        <p><?php the_title();?></p>
                        <p class="meta"><?php the_time(get_option('date_format')); ?></p>
                    </div>
                    </a>
                </li>

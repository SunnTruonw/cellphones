        
<div class="post-file-item bsize fleft" href="<?php the_permalink(); ?>">
    <a class="post-file-item-left block-content-fleft thumb-zoom fleft" href="<?php the_permalink(); ?>">
        <i class="fal fa-play"></i>
    </a>
    <div class="post-file-item-right fright">
        <h4 class="post-file-item-title">
            <a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
        <div class="post-file-item-meta"><p>
                <i class="fas fa-eye"></i><?php echo getPostViews(get_the_ID()); ?>
                <?php
                $current_term = get_the_terms( get_the_ID(), 'category' ); ?>
                <a  href="<?php echo get_term_link((int)$current_term[0]->term_id, $taxonomy); ?>"><i class="fas fa-folder"></i><?php echo $current_term[0]->name; ?></a>
                <div class="cboth"></div>
            </p>
        </div>
    </div>
    <div class="cboth"></div>  
</div>
<section class="sidebar-app-item post-app-item bsize">
    <a class="post-app-item-thumb fleft thumb-cover" href="<?php the_permalink(); ?>">
        <?php if(has_post_thumbnail()){the_post_thumbnail('full'); }else{ echo '<img src="images/thumb/placeholder.png" alt="not avaiable" title="not avaiable"/>'; } ?>
    </a>
    <section class="post-app-item-info">
        <h2 class="post-app-item-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
    </section>
    <section class="cboth"></section>
</section>
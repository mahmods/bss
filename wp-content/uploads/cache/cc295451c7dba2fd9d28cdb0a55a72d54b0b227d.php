<tr class="table-content">
    <td><?php the_title(); ?></td>
    <td><?php echo get_post_meta( get_the_ID(), 'job_req', true) ?></td>
    <td><?php echo get_post_meta( get_the_ID(), 'job_level', true) ?></td>
    <td><a href="<?php the_permalink(); ?>" class="btn large primary job-btn">التقديم على الوظيفه</a></td>
</tr>
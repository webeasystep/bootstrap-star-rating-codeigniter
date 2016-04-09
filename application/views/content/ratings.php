    <!-- Placed at the end of the document so the pages load faster -->
    <link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" >
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>global/assets/rating/css/star-rating.css" media="all"  type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>global/assets/rating//js/star-rating.js" type="text/javascript"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        $('.rating').on('rating.change', function (event, value, caption) {
            var rate_id = $(this).prop('id');
            var pure_id = rate_id.substring(6);
            $.post('<?= base_url()?>rating/create_rate', {score: value, pid: pure_id},
                function (data) {
                    $('#' + rate_id).rating('refresh', {
                        showClear: false,
                        showCaption: false,
                        disabled: true
                    });
                });
            alert(value);
            console.log(pure_id);
        });
    });

</script>
    <div class="starter-template">
        <h1>Bootstrap start Rating</h1>
        <img src="<?php echo base_url(); ?>global/uploads/<?= $news->ne_img; ?>"/>
        <span dir="ltr" class="inline">
        <input id="input-<?= $news->ne_id ?>" name="rating"
            <?php if ($news->nrt_total_rates > 0 or $news->nrt_total_points > 0) { ?>
                value="<?php echo $news->nrt_total_points / $news->nrt_total_rates ?>"
            <?php } else { ?>
                value="0"
            <?php } ?>
            <?php if ($this->session->userdata('uid') == false) { ?>
                data-disabled="false"
            <?php } else { ?>
                data-disabled="<?= $rated ?>"
            <?php } ?>
               class="rating "
               min="0" max="5" step="0.5" data-size="xs"
               accept="" data-symbol="&#xf005;" data-glyphicon="false"
               data-rating-class="rating-fa">
    </span>
        <!-- Jquery and Raty Js with scrpt having class star -->

        <a class="btn btn-danger" href="<?= base_url() ?>rating/clear_user_rating">Clear user rating</a>
    </div>

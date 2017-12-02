<div class="col-md-12 text-center">
    <img src="img/logo.jpg" class="img-fluid" alt="Responsive image">
    <?php if ($user->admin) : ?>

    <?php else : ?>
        <p class="h2 mt-5">Welcome!</p>
        <p>To find out where to take a bag of clothes, select "Delivery Address" from the menu above.</p>
        <p>Thank you for sharing clothes with your neighbors!</p>
        <p> 
            Help us spread the word about the clothesline by adding  
            <a href="/wp-content/uploads/2017/10/Clothesline-Flyer.pdf" target="_blank">this flyer</a> 
            to a community board near you.
        </p>
        <p>
            Full information about <?= $config['app']['title'] ?> 
            can be found on <a href="/clothesline" target="_blank">our website</a>.
        </p>
        <p>Please watch this space for program announcements...</p>
    <?php endif; ?>
</div>

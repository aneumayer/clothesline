<div class="col-md-12 text-center">
    <img src="img/logo.jpg" class="img-fluid" alt="Responsive image">
    <?php if ($user->admin) : ?>

    <?php else : ?>
        <p>Welcome!</p>
        <p>Please watch this space for program announcements.</p>
        <p>To find out where to take a bag of clothes, select "Delivery Address" from the menu above.</p>
        <p>Thank you for sharing clothes with your neighbors!</p>
        <p class="mt-4">
            Full information about <?= $config['app']['title'] ?> 
            can be found on <a href="https://www.connectionsinc.org/clothesline" target="_blank">our website</a>.
        </p>
    <?php endif; ?>
</div>

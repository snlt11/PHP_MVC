<h1>Home's Index Page</h1>

<ul>
    <?php foreach($data as $user) :?>
        <li>
            <?php echo $user->name; ?>
            <br />
            <?php echo $user->email; ?>
            <br />
            <?php echo $user->password; ?>
        </li>
        <br>
    <?php endforeach; ?>

</ul>

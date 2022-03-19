<?php 
    $link = mysqli_connect("localhost", "root", "", "store");
    // mysqli_query($link, "INSERT INTO user 
    //     (name, surname, login, password, email, user_type) 
    //     VALUES ('Danila', 'Mihaylove', 'admin', 'admin', 'syvs0990@mail.ru', 1)");

    // mysqli_query($link, "INSERT INTO product
    // (name, price, image, first_description, second_description, third_description, product_type) 
    // VALUES ('Obi belt', 19, 'images/image.jpg',
    // 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae non deleniti ipsam incidunt, velit animi molestiae esse optio expedita, ea veniam eveniet quidem? Incidunt, quas unde distinctio expedita ad eos.',
    // 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae non deleniti ipsam incidunt, velit animi molestiae esse optio expedita, ea veniam eveniet quidem? Incidunt, quas unde distinctio expedita ad eos.',
    // 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae non deleniti ipsam incidunt, velit animi molestiae esse optio expedita, ea veniam eveniet quidem? Incidunt, quas unde distinctio expedita ad eos.',
    // 1)");

    $result = mysqli_query($link, "SELECT * FROM product");
    
    while ($row = mysqli_fetch_array($result)) {
        print_r($row);
        echo "<br/>";
    } 
?>
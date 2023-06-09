


<?php
   
    function view_cars(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT * FROM cars ORDER BY name ASC';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            if ($row['status'] == 1) {
                $status = '<span class="badge bg-success">Available</span>';
            } else {
                $status = '<span class="badge bg-danger">Unavailable</span>';
            }
        ?>
            <tr class="odd" role="row">
                <td class="sorting_1"><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['brand']; ?></td>
                <td><?php echo $row['color']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $status; ?></td>
               
                <td>
                    <button class="btn btn-success btn-sm" role="button" data-bs-target="#update" data-bs-toggle="modal" type="button" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-brand="<?php echo $row['brand']; ?>" data-color="<?php echo $row['color']; ?>" data-price="<?php echo $row['price']; ?>" data-status="<?php echo $row['status']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-danger btn-sm btn-hapus" role="button" data-bs-target="#remove" data-bs-toggle="modal" type="button" data-id="<?php echo $row['id']; ?>">
                        <i class="fas fa-trash"></i>
                    </button>

                </td>
            </tr>
        <?php
        }

    }

    function view_customers(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the customers table
        $sql = 'SELECT * FROM customers ORDER BY fullname ASC';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach ($results as $row) {
            ?>
                <tr role="row" class="odd">
                    <td class="sorting_1"><?php echo $row['id'];?></td>
                    <td><?php echo $row['fullname'];?></td>
                    <td><?php echo $row['sex'];?></td>
                    <td><i class="fas fa-phone-volume"></i> <?php echo $row['phone'];?><br><i class="fas fa-id-card-alt"></i> <?php echo $row['email'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td>
                        <button class="btn btn-success btn-sm" type="button" data-bs-target="#update" data-bs-toggle="modal" data-id="<?php echo $row['id']; ?>" data-fullname="<?php echo $row['fullname']; ?>" data-email="<?php echo $row['email']; ?>" data-address="<?php echo $row['address']; ?>" data-phone="<?php echo $row['phone']; ?>" data-sex="<?php echo $row['sex']; ?>">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button class="btn btn-danger btn-sm btn-hapus" data-bs-target="#remove" data-bs-toggle="modal" type="button" data-id="<?php echo $row['id']; ?>">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php
        }
            
    }

    function view_transactions(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get data from the transactions table
        $sql = 'SELECT c.name AS car_name, c.color AS car_color, cu.fullname AS customer_name, t.id AS t_id, t.created_at as t_created, t.borrow_date, t.return_date, t.returned_date, t.penalty, t.total
                FROM transactions t
                JOIN cars c ON t.car_id = c.id
                JOIN customers cu ON t.customer_id = cu.id
                WHERE t.returned_date IS NULL';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            ?>
            <tr role="row" class="odd">
                <td class="sorting_1"><?php echo $row['t_id']; ?></td>
                <td><?php echo $row['t_created']; ?></td>
                <td><i class="fas fa-user"></i> <?php echo $row['customer_name']; ?><br><hr><i class="fas fa-car"></i> <?php echo $row['car_name']; ?></td>
                <td><i class="fas fa-palette"></i> <?php echo $row['car_color']; ?></td>
                <td><?php echo $row['borrow_date']; ?><br><hr><?php echo $row['return_date']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><?php echo $row['returned_date'] ? '<span class="badge bg-success">Returned</span><hr>' : '<span class="badge bg-danger">Not Returned</span><hr>"'; echo $row['returned_date'] ?></td>
                <td><?php echo $row['penalty']; ?></td>
                <td>
                    <button class="btn btn-info btn-sm btn-block" type="button" data-bs-target="#return" data-bs-toggle="modal" data-id="<?php echo $row['t_id']; ?>" data-car="<?php echo $row['car_name']; ?>"> <i class="fas fa-check"></i></button>
                    <button class="btn btn-danger btn-sm btn-block" type="button" data-bs-target="#remove" data-bs-toggle="modal" data-id="<?php echo $row['t_id']; ?>" data-car="<?php echo $row['car_name']; ?>"> <i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <?php
        }
    }

    function view_all_transactions(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get data from the transactions table
        $sql = 'SELECT c.price AS car_price, c.name AS car_name, c.color AS car_color, cu.fullname AS customer_name, t.id AS t_id, t.created_at as t_created, t.borrow_date, t.return_date, t.returned_date, t.penalty, t.total
                FROM transactions t
                JOIN cars c ON t.car_id = c.id
                JOIN customers cu ON t.customer_id = cu.id
                WHERE t.returned_date IS NOT NULL';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            ?>
            <tr role="row" class="odd">
            <td class="sorting_1"><?php echo $row['t_created']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['car_name']; ?></td>
            <td><?php echo $row['car_color']; ?></td>
            <td><?php echo $row['borrow_date']; ?></td>
            <td><?php echo $row['return_date']; ?></td>
            <td>₱ <?php echo $row['car_price']; ?></td>
            <td>₱ <?php echo $row['penalty']; ?></td>
            <td class="text-center"><i class="fas fa-check-circle" style="color: green;"></i> Finished</td>
            </tr>
            <?php
        }
    }

    function get_cars(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT * FROM cars WHERE status = 1 ORDER BY name ASC';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
        ?>
            <option value="<?php echo  $row['id'];?>"><?php echo  $row['name'];?></option>
        <?php
        }
    }

    function get_customers(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT * FROM customers  ORDER BY fullname ASC';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
        ?>
            <option value="<?php echo  $row['id'];?>"><?php echo  $row['fullname'];?></option>
        <?php
        }
    }

    function new_cars(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT * FROM cars ORDER BY created_at DESC LIMIT 5';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
        ?>
            <a href="cars.php" class="list-group-item list-group-item-action">
                <i class="fas fa-car"></i> <?php echo $row['name'] ?> <span class="badge badge-pill badge-success">Available</span>
            </a>
        <?php
        }
    }

    function new_customers(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT * FROM customers ORDER BY created_at DESC LIMIT 5';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
        ?>
            <a href="customers.php" class="list-group-item list-group-item-action">
                <i class="fas fa-user-circle"></i> <?php echo $row['fullname'] ?> <span class="badge badge-primary badge-pill"><i class="fas fa-male"></i></span>
            </a>
        <?php
        }
    }

    function get_customers_count(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT COUNT(*) AS total FROM customers';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo $row['total'];
        }
    }

    function get_cars_count(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT COUNT(*) AS total FROM cars WHERE status = 1';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo $row['total'];
        }
    }

    function get_transactions_sales(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT SUM(total) AS total FROM transactions WHERE returned_date IS NOT NULL';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo $row['total'];
        }
    }

    function get_transactions_returned(){
        $db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');
        // Get all data from the cars table
        $sql = 'SELECT COUNT(*) AS total FROM transactions WHERE returned_date IS NOT NULL';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            echo $row['total'];
        }
    }
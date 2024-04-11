<?php
/**
 *
 * 6/9/2023
 * 328/PizzaPlanet/controllers/controller-class.php
 *
 */

class Controller
{
    //F3 object
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $orderArray = $this->_f3->get('SESSION.currentOrder');
        if (!$orderArray) {
            $orderArray = array();
        }

        $pizzas = $GLOBALS['dataLayer']->getThreeItems("pizza");
        $this->_f3->set('SESSION.pizzas', $pizzas);
        $sides = $GLOBALS['dataLayer']->getThreeItems("sides");
        $this->_f3->set('SESSION.sides', $sides);
        $sodas = $GLOBALS['dataLayer']->getThreeItems("sodas");
        $this->_f3->set('SESSION.sodas', $sodas);

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $newItem =  $_POST['id'][0];
            array_push($orderArray, $newItem);
            $this->_f3->set('SESSION.currentOrder', $orderArray);
//            var_dump($orderArray);
        }
        // Display a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function menu()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/menu.html');
    }
    function pizza()
    {

        $orderArray = $this->_f3->get('SESSION.currentOrder');
        if (!$orderArray) {
            $orderArray = array();
        }

        $items = $GLOBALS['dataLayer']->getItems("pizza");
        $this->_f3->set('SESSION.items', $items);

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $newItem =  $_POST['id'][0];
            array_push($orderArray, $newItem);
            $this->_f3->set('SESSION.currentOrder', $orderArray);
            //var_dump($orderArray);
        }

        $view = new Template();
        echo $view->render('views/pizza.html');
    }

    function sides()
    {
        // Display a view page
        $orderArray = $this->_f3->get('SESSION.currentOrder');
        if (!$orderArray) {
            $orderArray = array();
        }


        $items = $GLOBALS['dataLayer']->getItems("sides");
        $this->_f3->set('SESSION.items', $items);

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $newItem =  $_POST['id'][0];
            array_push($orderArray, $newItem);
            $this->_f3->set('SESSION.currentOrder', $orderArray);
            if (isset($orderArray)) {
                //var_dump($orderArray);
            }
        }

        $view = new Template();
        echo $view->render('views/sides.html');
    }

    function sodas()
    {
        $orderArray = $this->_f3->get('SESSION.currentOrder');
        if (!$orderArray) {
            $orderArray = array();
        }
        // Display a view page

        $items = $GLOBALS['dataLayer']->getItems("sodas");
        $this->_f3->set('SESSION.items', $items);

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $newItem =  $_POST['id'][0];
            array_push($orderArray, $newItem);
            $this->_f3->set('SESSION.currentOrder', $orderArray);
            //var_dump($orderArray);
        }

        $view = new Template();
        echo $view->render('views/sodas.html');
    }

    function aboutUs()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/about.html');
    }

    function signUp()
    {

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $newUser = new User();

            $newUser->setPower("guest");

            if(isset($_POST['firstName'])){
                $firstName = $_POST['firstName'];
                $newUser->setFirstName($firstName);
            }
            if(isset($_POST['lastName'])){
                $lastName = $_POST['lastName'];
                $newUser->setLastName($lastName);
            }
            if(isset($_POST['newEmail'])){
                $email = $_POST['newEmail'];
                $newUser->setEmail($email);
            }
            if(isset($_POST['newPassword'])){
                $newPassword = $_POST['newPassword'];
                $newUser->setPassword($newPassword);
            }

            $userID = $GLOBALS['dataLayer']->saveUser($newUser);
            $this->_f3->reroute('login');
        }
        // Display a view page
        $view = new Template();
        echo $view->render('views/signUp.html');
    }

    function login()
    {
        $login = $this->_f3->get('SESSION.login');

        //Checks to see if an account is logged in already
        if(isset($login)){
            if($login->getPower()=='admin'){
                $this->_f3->reroute('admin');
            }
            if($login->getPower()=='guest'){
                $this->_f3->reroute('guest');
            }
        }

        //verifies user has an account
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            if (isset($_POST['userEmail']))
            {
                $userEmail = $_POST['userEmail'];
            }

            //call all users
            $user = $GLOBALS['dataLayer']->userLogin();

            //Val email and password
            if (validEmail($userEmail)){
                for ($i = 0; $i < sizeof($user) ; $i++){
                    if($_POST['userEmail']==$user[$i]['email'] && $_POST['userPass'] == $user[$i]['password'] ){

                        $login = new User($user[$i]['powers'], $user[$i]['first_name'], $user[$i]['last_name'], $user[$i]['email'], $user[$i]['password'], $user[$i]['user_id']);

                        $this->_f3->set('SESSION.login', $login);
                        echo ('<br>');
                        if($user[$i]['powers']=="admin"){
                            $this->_f3->reroute('admin');
                        } else {
                            $this->_f3->reroute('guest');
                        }

                    }
                    else{
                        $this->_f3->set('error["user"]', 'No Account Found');
                    }
                }
            }
            else{
                $this->_f3->set('error["$userEmail"]', 'Please Enter Valid Email');
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function admin()
    {
        $thing = $this->_f3->get('SESSION.login');

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if($_POST['logout']=='true'){
                $this->_f3->set('SESSION.login', null);
                $this->_f3->set('SESSION.orders', null);
                $this->_f3->reroute('login');
            }

//            $newItem = new Items("1", $_POST['type'], $_POST['name'], $_POST['desc']);
            $GLOBALS['dataLayer']->saveItem( $_POST['name'],$_POST['type'], $_POST['desc']);
        }


        $user = $this->_f3->get('SESSION.login');
        $pastOrders = $GLOBALS['dataLayer']->getPastOrders($user->getUserID());
        if(isset($pastOrders)){
        $orders2 = array();
        $orders = array();
            for ($i = 0; $i<sizeof($pastOrders); $i++){
                $orderItems = $pastOrders[$i]['order_items'];
                $splitOrders = explode(' ', $orderItems);
                for ($j = 1; $j < sizeof($splitOrders); $j++){

                    $item = $GLOBALS['dataLayer']->getOrderItems($splitOrders[$j]);
                    $newObject = new Items($item[0]['id'], $item[0]['type'], $item[0]['name'], $item[0]['description']);
                    array_push($orders, $newObject);
                    $this->_f3->set('SESSION.orders', $orders);
                }
                $things = $this->_f3->get('SESSION.orders');
                array_push($orders2, $things);
                $this->_f3->set('SESSION.orders2', $orders);
            }
            $things = $this->_f3->get('SESSION.orders');
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/admin.html');
    }

    //        checking user based off global variable
    function guest()
    {
//        $this->_f3->get('SESSION.login');
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->_f3->set('SESSION.login', null);
            $this->_f3->set('SESSION.orders', null);
            $this->_f3->reroute('login');
        }

        $user = $this->_f3->get('SESSION.login');
        $pastOrders = $GLOBALS['dataLayer']->getPastOrders($user->getUserID());
        if(isset($pastOrders)){
            $orders2 = array();
            $orders = array();
            for ($i = 0; $i<sizeof($pastOrders); $i++){
                $orderItems = $pastOrders[$i]['order_items'];
                $splitOrders = explode(' ', $orderItems);
                for ($j = 1; $j < sizeof($splitOrders); $j++){

                    $item = $GLOBALS['dataLayer']->getOrderItems($splitOrders[$j]);
                    $newObject = new Items($item[0]['id'], $item[0]['type'], $item[0]['name'], $item[0]['description']);
                    array_push($orders, $newObject);
                    $this->_f3->set('SESSION.orders', $orders);
                }
                $things = $this->_f3->get('SESSION.orders');
                array_push($orders2, $things);
                $this->_f3->set('SESSION.orders2', $orders);
            }
            $things = $this->_f3->get('SESSION.orders');
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/guest.html');
    }

    function order()
    {

            $this->_f3->set('crust', DataLayer::getCrust());
            $this->_f3->set('sauce', DataLayer::getSauce());
            $this->_f3->set('toppings', DataLayer::getToppings());
            $this->_f3->set('size', DataLayer::getSize());

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            if (isset($_POST['crust']))
            {
                $crust = $_POST['crust'];
            }

            if (isset($_POST['sauce']))
            {
                $sauce = $_POST['sauce'];
            }

            if (isset($_POST['toppings']))
            {
                $toppings = $_POST['toppings'];
            }
            else{
                $toppings = null;
            }

//            if (isset($_POST['size']))
//            {
//                $size = $_POST['size'];
//            }
//            else{
//                $size = "";
//            }

            $newPizza = new customPizza();

            //Check the crust
            if (validSelectedCrust($crust)){
                $newPizza->setCrust($crust);
            }
            else {
                $this->_f3->set('errors["$crust"]', 'Please Select Crust');
            }


            //Check the sauce
            if (validSelectedSauce($sauce)){
                $newPizza->setSauce($sauce);
            }
            else {
                $this->_f3->set('errors["$sauce"]', 'Please Select Sauce');
            }

            //Check the toppings
            if (validSelectedToppings($toppings)){
                $toppings = implode(" ", $toppings);
                $newPizza->setToppings($toppings);
            }
            else {
                $this->_f3->set('errors["$toppings"]', 'Please Select a Topping');
            }



            if (empty( $this->_f3->get('errors'))) {

                $customArray = array();

                $item = $GLOBALS['dataLayer']->saveCustom($newPizza->getCrust(),$newPizza->getSauce(), $newPizza->getToppings());
                $lastCustom = $GLOBALS['dataLayer']->getLastCustom();
                $newestPizza = $lastCustom[0]['custom_id'];
                $orderArray = $this->_f3->get('SESSION.currentOrder');
                if (!$orderArray) {
                    $orderArray = array();
                }
                array_push($orderArray, $newestPizza);
                $this->_f3->set('SESSION.currentOrder', $orderArray);
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/orderPage.html');
    }

    function cart()
    {
        $orderArray = $this->_f3->get('SESSION.currentOrder');

        $finishedOrder = array();
        $total = 0.0;

        $orderNums = "";

        $currentUser = $this->_f3->get('SESSION.login');
        // var_dump($currentUser->getUserID());

        if(isset($orderArray)){
            for ($i = 0; $i < sizeof($orderArray); $i++){
                $orderNums .= " " . $orderArray[$i];


                if(intval($orderArray[$i])>=1000){
                    $item = $GLOBALS['dataLayer']->getCustomItems(intval($orderArray[$i]));
                    $newObject = new Items("1", 'pizza', "Custom Pizza!", "Crust: ".$item[0]['crust']."Sauce: ".$item[0]['sauce']."Toppings: ".$item[0]['toppings']);

                } else {
                    $item = $GLOBALS['dataLayer']->getOrderItems($orderArray[$i]);
                    $newObject = new Items("1", $item[0]['type'], $item[0]['name'], $item[0]['description']);

                }

                if($item[0]['type'] == "pizza"){
                    $total += 12.99;
                } elseif ($item[0]['type'] == "sides"){
                    $total += 6.99;
                } else {
                    $total += 3.99;
                }
                array_push($finishedOrder, $newObject);
                $this->_f3->set('SESSION.order', $finishedOrder);
            }
            $this->_f3->set('SESSION.total', $total * 1.08);
        }
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $item = $GLOBALS['dataLayer']->saveOrder($currentUser->getUserID(), $orderNums, $total *1.08);

            $this->_f3->set('SESSION.order', null);
            $this->_f3->set('SESSION.currentOrder', null);
            $total = 0.0;
            $this->_f3->set('SESSION.total', $total);
            $orderNums = "";
            $this->_f3->reroute('login');
        }

//        var_dump($orderNums);
        // Display a view page
        $view = new Template();
        echo $view->render('views/cart.html');
    }


}
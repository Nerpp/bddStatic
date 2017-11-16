class DB {

    // Access Through Instance
    private static $instance = NULL;

    // Prevent Use of new DB()
    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if(!isset(self::$instance)) {
            $host = "localhost";
            $database = "db";
            $username = "user";
            $password = "password";
            $charset = "utf8";
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            self::$instance = new PDO("mysql:host=$host;dbname=$database;charset=$charset", $username, $password, $pdo_options);
        }
        return self::$instance;
    }
}
Then anytime you need a DB in your class, use:
$db = DB::getInstance();

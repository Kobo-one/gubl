<?php
include_once("Db.class.php");
class Product {
    private $image;
    private $name;
    private $category;
    private $originalPrice;
    private $description;
    private $user;
    private $maxAantal;
    private $endDate;
    private $pickupDate;
    private $tussenAantallen;
    private $tussenPrijzen;
    private $id;


    

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }


    /**
     * Get the value of maxAantal
     */ 
    public function getMaxAantal()
    {
        return $this->maxAantal;
    }

    /**
     * Set the value of maxAantal
     *
     * @return  self
     */ 
    public function setMaxAantal($maxAantal)
    {
        $this->maxAantal = $maxAantal;

        return $this;
    }

    /**
     * Get the value of endDate
     */ 
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate
     *
     * @return  self
     */ 
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get the value of pickupDate
     */ 
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * Set the value of pickupDate
     *
     * @return  self
     */ 
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    /**
     * Get the value of tussenPrijzen
     */ 
    public function getTussenPrijzen()
    {
        return $this->tussenPrijzen;
    }

    /**
     * Set the value of tussenPrijzen
     *
     * @return  self
     */ 
    public function setTussenPrijzen($tussenPrijzen)
    {
        $this->tussenPrijzen = $tussenPrijzen;

        return $this;
    }

    /**
     * Get the value of tussenAantallen
     */ 
    public function getTussenAantallen()
    {
        return $this->tussenAantallen;
    }

    /**
     * Set the value of tussenAantallen
     *
     * @return  self
     */ 
    public function setTussenAantallen($tussenAantallen)
    {
        $this->tussenAantallen = $tussenAantallen;

        return $this;
    }
    
    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    /**
     * Get the value of originalPrice
     */ 
    public function getOriginalPrice()
    {
        return $this->originalPrice;
    }

    /**
     * Set the value of originalPrice
     *
     * @return  self
     */ 
    public function setOriginalPrice($originalPrice)
    {
        $this->originalPrice = $originalPrice;

        return $this;
    }

    public function createProduct(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO products (`name`, `picture`, `description`, `category`, `pickup_date`, `end_date`, `owner`, `max_amount`,`original_price` ) VALUES (:name,:image,:description,:category,:pickupDate,:endDate,:user,:maxAantal, :originalPrice)");
        $statement->bindValue(":name", $this->getName());
        $statement->bindValue(":image", $this->getImage());
        $statement->bindValue(":description", $this->getDescription());
        $statement->bindValue(":category", $this->getCategory());
        $statement->bindValue(":user", $_SESSION['user']);
        $statement->bindValue(":pickupDate", $this->getPickupDate());  
        $statement->bindValue(":endDate", $this->getEndDate());
        $statement->bindValue(":maxAantal", $this->getMaxAantal()); 
        $statement->bindValue(":originalPrice", $this->getOriginalPrice());     
        $product_upload = $statement->execute();
        $this->setId($conn->lastInsertId());
        $this->savePrices();
        return $product_upload;
    }

    public function savePrices(){
        $conn = Db::getInstance();
        $aantallen = $this->getTussenAantallen();
        $prijzen = $this->getTussenPrijzen();
        foreach($aantallen as $key => $value){

            $statement = $conn->prepare("INSERT INTO `prices`(`product`, `price`, `amount`) VALUES (:id,:price,:aantal)");
            $statement->bindValue(":id", $this->getId());
            $statement->bindValue(":price", $prijzen[$key]);
            $statement->bindValue(":aantal", $aantallen[$key]);
            $product_upload = $statement->execute();

        }
        return $product_upload;
    }


    public static function getAllProducts(){
        $conn = Db::getInstance();
        $statement=$conn->prepare("SELECT * FROM products WHERE ended = 0 ORDER BY end_date ASC");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key => $c){
            $result[$key]['prices'] = Product::getAllPrices($c['id']);
        }
        return $result;

    }  

    public static function getAllPrices($id){
        $conn = Db::getInstance();
        $statement=$conn->prepare("SELECT price,amount FROM prices WHERE product = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getFilteredProducts($type){
        $products = Product::getAllProducts();
        $filteredProducts = [];

        foreach ($products as $key => $p) {
            if ($p['category'] === $type) {
                $filteredProducts[$key] = $p;
            }
        }
        return $filteredProducts;

    }  
    public static function getProduct($id){
        $conn = Db::getInstance();
        $statement=$conn->prepare("SELECT * FROM products WHERE id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key => $c){
            $result[$key]['prices'] = Product::getAllPrices($c['id']);
        }
        return $result;

    }  

}


?>
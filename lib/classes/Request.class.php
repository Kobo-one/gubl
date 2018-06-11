<?php
include_once("Db.class.php");
class Request {
    private $images;
    private $name;
    private $category;
    private $originalPrice;
    private $description;
    private $user;
    private $endDate;
    private $artikels;
    private $id;


    /**
     * Get the value of image
     */ 
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImages($images)
    {
        $this->images = $images;

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
     * Get the value of artikels
     */ 
    public function getArtikels()
    {
        return $this->artikels;
    }

    /**
     * Set the value of artikels
     *
     * @return  self
     */ 
    public function setArtikels($artikels)
    {
        $this->artikels = $artikels;

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



    public function createRequest(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO requests (`title`,`category`,`end_date`, `user` ) VALUES (:name,:category,:endDate,:user)");
        $statement->bindValue(":name", $this->getName());
        $statement->bindValue(":category", $this->getCategory());
        $statement->bindValue(":user", $_SESSION['user']);
        $statement->bindValue(":endDate", $this->getEndDate());   
        $request_upload = $statement->execute();
        $this->setId($conn->lastInsertId());
        return $request_upload;
    }

    public function saveArtikels(){
        $conn = Db::getInstance();
        $artikels = $this->getArtikels();
        $images = $this->getImages();
        $prijzen = $this->getOriginalPrice();
        $description = $this->getDescription();
        foreach($artikels as $key => $a){

            $statement = $conn->prepare("INSERT INTO `request_product`(`name`, `picture`, `price`, `description`, `request` ) VALUES (:name,:image,:price, :description, :id)");
            $statement->bindValue(":id", $this->getId());
            $statement->bindValue(":price", $prijzen[$key]);
            $statement->bindValue(":name", $artikels[$key]);
            $statement->bindValue(":description", $description[$key]);
            $statement->bindValue(":image", $images[$key]);
            $request_upload = $statement->execute();

        }
        return $request_upload;
    }


    public static function getAllRequests(){
        $conn = Db::getInstance();
        $statement=$conn->prepare("SELECT * FROM requests WHERE ended = 0 ORDER BY end_date ASC");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key => $c){
            $result[$key]['artikels'] = Request::getAllArtikels($c['id']);
        }
        return $result;

    }  

    public static function getAllArtikels($id){
        $conn = Db::getInstance();
        $statement=$conn->prepare("SELECT * FROM request_product WHERE request = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getRequest($id){
        $conn = Db::getInstance();
        $statement=$conn->prepare("SELECT * FROM requests WHERE id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key => $c){
            $result[$key]['artikels'] = Request::getAllArtikels($c['id']);
        }
        return $result;

    }  

}


?>
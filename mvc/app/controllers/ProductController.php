<?php


class ProductController{
    public function index()
    {
        $db=new Product();
        $data['products']=$db->getAllProduct();
        View::load('product/index',$data);

    }
    public function add(){
        View::load('product/add');
    }
    public function store(){
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $price=$_POST['price'];
            $qty=$_POST['qty'];
            $desc=$_POST['description'];

            $data=array(
                'name'=>$name,
                'price'=>$price,
                'quantity'=>$qty,
                'description'=>$desc
            );
            $db= new Product();
            if($db->insertProduct($data)){

                View::load('product/add',["success"=>"Data Created Successfully"]);
            }else{
                View::load('product/add');

            }
        }
    }
    public function edit($id){
        $db=new Product();
        if($db->getRow($id)){
            $data['row']=$db->getRow($id);
            View::load('product/edit',$data);
        }else{
            echo "No Row";
        }
    }
    public function update($id){
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $price=$_POST['price'];
            $qty=$_POST['qty'];
            $desc=$_POST['description'];

            $dataInsert=array(
                'name'=>$name,
                'price'=>$price,
                'quantity'=>$qty,
                'description'=>$desc
            );
            $db= new Product();
            if ($db->updateProduct($id, $dataInsert)) {
                View::load('product/edit', ["success" => "Data Updated Successfully", 'row' => $db->getRow($id)]);
            } else {
                View::load('product/edit', ['row' => $db->getRow($id)]);
            }
            
        }
    }
    public function delete($id){
        $db= new Product();
        if($db->deleteProduct($id)){
        View::load('product/delete');
        }else{
            echo "error";
        }
    }
}
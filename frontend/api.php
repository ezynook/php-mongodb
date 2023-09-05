<?php
    require 'vendor/autoload.php';  
    use Ramsey\Uuid\Uuid;
    $con = new MongoDB\Client("mongodb://mongo:27017");  
    $collection = $con->test_db->test_tb; 

    function fetchAll($type){
        if ($type == 1){
            $collection = $GLOBALS['collection'];
            $record = $collection->find([]);
            return $record;
        }elseif ($type == 2){
            $collection = $GLOBALS['collection'];
            $record = $collection->find([]);
            $data = array();
            foreach($record as $val){
                $data[] = $val;
            }
            echo json_encode($data, true);
        }
    }

    if (isset($_POST['type']) && $_POST['type'] == 'add'){
        $uuid4 = Uuid::uuid4();
        $result_id = $uuid4->toString();
        $idx = str_replace("-","",$result_id);
        $collection->insertOne([
            'idx' => $idx,
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ]); 
        echo "<script>
                alert('Save Successfully');
                window.location.href = 'index.php?menu=home';
            </script>";
    }
    if (isset($_POST['type']) && $_POST['type'] == 'edit') {
        $updateResult = $collection->updateOne(
            ['idx' => $_POST['id']],
            ['$set' => ['name' => $_POST['name'], 'email' => $_POST['email']]]
        );
        echo json_encode(array(
            "status_code" => 200,
            "message" => "success"
        ));
            
    }
    if (isset($_GET['type']) && $_GET['type'] == 'delete'){
        $deleteResult = $collection->deleteOne(["idx" => $_GET['id']]);

        if ($deleteResult->getDeletedCount() > 0) {
            echo "
                <script>
                    window.location.href = 'index.php?menu=home';
                </script>
            ";
        } else {
            echo "Document not deleted<br>";
        }
    }
?>
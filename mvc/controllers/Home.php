<?php



class Home extends Controller{

    // Must have SayHi()
    function SayHi(){
        $teo = $this->model("SinhVienModel");
        echo $teo->GetSV();

    }

    function Show($a, $b){        
        // Call Models
        $teo = $this->model("SinhVienModel");
        $tong = $teo->Tong($a, $b); // 3

        // Call Views
        $this->view("aodep", [
            "Page"=>"news",
            "Number"=>$tong,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
            "SV" => $teo->SinhVien()
        ]);
    }
    function a(){
        $user=$this->model("User");
        $result=$user->get();
        $row = mysqli_fetch_assoc($result);    
        $this->view("news",["name"=>$row["name"]]);
    }

}
?>
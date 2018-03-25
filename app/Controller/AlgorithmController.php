<?php
App::uses('AppController', 'Controller');
/**
 * Bitballs Controller
 *
 * @property Bitball $Bitball
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AlgorithmController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void *
 *
 */
    public function searchAndDestroy($del_val,$messages){

        if (($key = array_search($del_val, $messages)) !== false) {
            unset($messages[$key]);
        }

    }

    public function getRandomBall(&$arr, $number){

       $this->loadModel('Bitball');

       $allBitballs = $this->Bitball->find('all');

       $gotColors = array();

       foreach ($allBitballs as $bitkeys){
           $gotColors[]=$bitkeys['Bitball']['ballcolor'];
       }

        $rand_keys = array_rand($gotColors, $number);

        for($i=0;$i<count($rand_keys);$i++){

            $arr[]=$gotColors[$rand_keys[$i]];

        }



    }

    public function setDistribution(&$arr, $numberOfColors)
    {
        $actualNumberOfBalls = pow($numberOfColors,2);

        $constructArray = array();

        for($i = 0; $i<$numberOfColors; $i++){
            $constructArray[]=1; //atleast all colors have one ball!
        }

        $remainingColors = $actualNumberOfBalls - $numberOfColors;



        for ($j=0; $j<count($constructArray);$j++){



            if($remainingColors <= 0 ) break;

            $randomNumberGenerator = rand(1,$remainingColors);




            $constructArray[$j] += $randomNumberGenerator;

            $remainingColors = $remainingColors - $randomNumberGenerator;

        }

        $combinedArr = array_combine($arr,$constructArray);
        $arr = $combinedArr;





    }

    public function setGroups($arr, $numberOfColors){

        $contructorArray = $arr;

        $mainGroup = array();

        foreach ($contructorArray as $ckey => $cval){

            if($cval >= $numberOfColors){
                $randomNumber = rand(1,$numberOfColors);
                $mainGroup[] = array("$ckey"=>$randomNumber);
                $contructorArray[$ckey] = $cval - $randomNumber;
            }else{
                $randomNumber = rand(1,$cval);
                $mainGroup[] = array("$ckey"=>$randomNumber);
                $contructorArray[$ckey] = $cval - $randomNumber;
            }



        }



        foreach ($contructorArray as $conkey => $conval){
            if($conval <= 0) unset($contructorArray[$conkey]);
        }






        foreach ($mainGroup as $groupindex => $grouparr){

            if(count($grouparr) >=2) continue;
            else{
                if(count($contructorArray) > 0) {
                    $randomKey = array_rand($contructorArray, 1);
                    $gotColorKey = $randomKey; //this is the color key


                    $gotColorValue = $contructorArray[$gotColorKey]; //

                    if ($gotColorValue > $numberOfColors) {
                        $contructorArray[$gotColorKey] = $gotColorValue - $numberOfColors;
                        $gotColorValue = $numberOfColors;
                    } else {
                        unset($contructorArray[$gotColorKey]);
                    }


                    if (array_key_exists($gotColorKey, $grouparr)) {
                        $mainGroup[$groupindex][$gotColorKey] += $gotColorValue;
                    } else {
                        $mainGroup[$groupindex][$gotColorKey] = $gotColorValue;
                    }

                }
            }


        }
       // echo "<br>Final Group: ";
      //  print_r($finalGroup);



        return $mainGroup;
    }


    public function shuffle_assoc(&$array) {
        $keys = array_keys($array);

        shuffle($keys);

        foreach($keys as $key) {
            $new[$key] = $array[$key];
        }

        $array = $new;

    }


	public function algorithm() {

        $this->loadModel('Bitball');

        $allBitballs = $this->Bitball->find('all');

        $allBallColors = array();
        foreach ($allBitballs as $bitkey){
            $allBallColors[]=$bitkey['Bitball']['ballcolor'];
        }

        $countBalls = count($allBitballs);

        $this->set("counter",$countBalls);
        $this->set("totalballs",$allBallColors);
	}



	public function display(){

        if($this->request->is('post')){
           // print_r($this->request->data);
            if(isset($this->request->data['Balls']) && $this->request->data['radioButtonForm'] == 0){

                $gotBallsNumber = $this->request->data['Balls'];

                $ballArr = array();
                $this->getRandomBall($ballArr, $gotBallsNumber);
                $this->setDistribution($ballArr,$gotBallsNumber);
                $group = $this->setGroups($ballArr,$gotBallsNumber);

                $this->set("gotballs",$ballArr);
                $this->set("group",$group);

                $varGroup = json_encode($group);
                $varTotal = pow($gotBallsNumber,2);

                $this->loadModel('Log');
                $this->Log->create();
                $this->Log->set('groups', $varGroup);
                $this->Log->set('total', $varTotal);
                $this->Log->save();


            }elseif($this->request->data['radioButtonForm'] == 1){

                $gotColors = $this->request->data['Colors'];
                $formattedColors = substr($gotColors, 0, -1);

                $colorArray = explode(",",$formattedColors);
                $gotColorNumber = count($colorArray);


                $this->setDistribution($colorArray,$gotColorNumber);
                $group2 = $this->setGroups($colorArray,$gotColorNumber);

                $this->set("gotballs",$colorArray);
                $this->set("group",$group2);

                $varGroup2 = json_encode($group2);
                $varTotal2 = pow($gotColorNumber,2);

                $this->loadModel('Log');
                $this->Log->create();
                $this->Log->set('groups', $varGroup2);
                $this->Log->set('total', $varTotal2);
                $this->Log->save();


            }






        }




    }


}

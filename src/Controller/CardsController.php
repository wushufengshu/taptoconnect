<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CardsController extends AppController
{
    public $connection;

    public function initialize(): void
    {
        parent::initialize();
        $this->Authorization->skipAuthorization();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //$cards = $this->paginate($this->Cards);
        $cards = $this->Cards->find()->order(['id' => 'desc'])->all();

        if(isset($_POST["submit"])){

        $filename=$_FILES["file"]["tmp_name"];

        if($_FILES["file"]["size"] > 0){

                $file = fopen($filename, "r");
                $num = 0;
                $insertquery = "";
                while ($data = fgetcsv($file)){
                    if($num == 0){ //skip header names in CSV file
                        $num++;
                    } 
                    else{
                    $serial_code = $data[0];
                    $verification_code = $data[1];
                    $card_link = $data[2];
                    $created = date('Y-m-d H:i:s');
                    /*
                    $data = array(
                        'serial_code' => $serial_code,
                        'verification_code' => $verification_code,
                        'card_link' => $card_link
                    );

                    $Cards = $this->Cards->newEntity($data);
                    $this->Cards->save($Cards);
                    */
                     $insertquery = $this->connection->execute("
                        INSERT INTO cards(
                       serial_code,verification_code,card_link,created) 
                        SELECT * FROM 
                        (SELECT '$serial_code') AS tmp1,
                        (SELECT '$verification_code') AS tmp2,
                        (SELECT '$card_link') AS tmp3,
                        (SELECT '$created') AS tmp4 
                        WHERE NOT EXISTS 
                        (SELECT 
                        serial_code,verification_code,card_link,created
                        FROM 
                        cards 
                        WHERE 
                        serial_code = '$serial_code' 
                        AND
                        verification_code = '$verification_code'
                        )
                        ");
                    }
                }
                        if($insertquery) {
                        $this->Flash->success(__('Cards CSV data has been saved.'));
                        return $this->redirect(['controller' => 'Cards','action' => 'index']);//redirect to cards main
                        }
                        else{
                        $this->Flash->error(__('Cards CSV data could not be saved. Please, try again.'));
                        }

                fclose($file);
            }
                
        }
            $card = $this->Cards->newEmptyEntity();
            if ($this->request->is('post') && isset($_POST['generate'])) {
                
                $card = $this->Cards->patchEntity($card, $this->request->getData());
                $quantity = $_POST['quantity'];
                //dd($quantity);
                for ($i=0; $i < $quantity; $i++) { 

                    $scode = $this->Cards->generate_scode(); //call function from CardsTable Model to generate unique code for serial code
                    $vcode = $this->Cards->generate_vcode(); //call function from CardsTable Model to generate unique code for verification code
                    $link = "http://taptoconnect.local:8080/serialcode/";
                    $card_link = trim($link.$scode);
                    
                    $created = date('Y-m-d H:i:s');

                    $insertquery = $this->connection->execute("
                        INSERT INTO cards(
                       serial_code,verification_code,card_link,created) 
                        SELECT * FROM 
                        (SELECT '$scode') AS tmp1,
                        (SELECT '$vcode') AS tmp2,
                        (SELECT '$card_link') AS tmp3,
                        (SELECT '$created') AS tmp4 
                        WHERE NOT EXISTS 
                        (SELECT 
                        serial_code,verification_code,card_link,created
                        FROM 
                        cards 
                        WHERE 
                        serial_code = '$scode' 
                        AND
                        verification_code = '$vcode'
                        )
                        ");
                }
                        if($insertquery) {
                        $this->Flash->success(__('Cards data has been saved.'));
                        return $this->redirect(['controller' => 'Cards','action' => 'index']);//redirect to cards main
                        }
                        else{
                        $this->Flash->error(__('Cards data could not be saved. Please, try again.'));
                        }
                
            }

            if(isset($_POST['export_selected']) && isset($_POST['checked_item']) ){

                $checkboxes = $_POST['checked_item'];

                for($i = 0; $i < count($checkboxes); $i++){
           
                    $checked_item = $_POST['checked_item'][$i];

                        $card_list = $this->Cards
                        ->find()
                        ->select([
                            'id', 'serial_code', 'verification_code', 'card_link', 'created'
                        ])
                        ->where(['id' => $checked_item])
                        ->all();

                        $delimiter = ","; 
                        $f = fopen('php://output', 'w');

                        $flag = false;
                        foreach ($card_list as $key => $value) {

                        $arr =array(
                            'Id' => $value['id'],
                            'Serial Code' => $value['serial_code'],
                            'Verification Code' => $value['verification_code'], 
                            'Card Link' => $value['card_link'], 
                            'Created' => $value['created']);
                        
                        if(!$flag) { 
                           // display field/column names as first row 
                           fputcsv($f, array_keys($arr), ',', '"');
                           $flag = true; 
                         } 

                        fputcsv($f, array_values($arr), ',', '"');

                        //$lineData = array($value['id'],$value['serial_code'], $value['verification_code'], $value['card_link'], $value['created']); 
                        //fputcsv($f, $lineData, $delimiter);
                        
                        }
                        fclose($f) or die("Can't close php://output");

                        $filename = "CARD_DATA_".date("Y_m_d_H_i_s").".csv";
                       // Set headers to download file rather than displayed 
                        header('Content-Type: text/csv'); 
                        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
        
                  }
                  exit();
            }
        

        $this->set(compact('cards','card'));
    }

    public function exportcsv(){
    $filename = "CARDS_DATA_".date("Y_m_d_H_i_s").".csv";
    $this->response = $this->response->withDownload($filename);
    $cards = $this->Cards->find()->all();
    //dd($cards);
    $_serialize = 'cards';
    $_header = ['Serial Code', 'Verification Code', 'Card Link', 'Created'];
    $_extract = ['serial_code', 'verification_code', 'card_link', 'created'];

    $this->viewBuilder()->setClassName('CsvView.Csv');
    $this->set(compact('cards', '_serialize', '_header', '_extract'));
    }

    /**
     * View method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('card'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $card = $this->Cards->newEmptyEntity();
        if ($this->request->is('post')) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $this->set(compact('card'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $this->set(compact('card'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id);
        if ($this->Cards->delete($card)) {
            $this->Flash->success(__('The card has been deleted.'));
        } else {
            $this->Flash->error(__('The card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function downloadcardform(){
        $this->Authorization->skipAuthorization();  
        $file_path = WWW_ROOT.'forms'.DS.'UBP_MASS_CARDS_FORM.csv'; 
        $response = $this->response->withFile(
              $file_path,
            ['download' => true, 'name' =>'UBP_MASS_CARDS_FORM.csv']
        );
        return $response;
    }
}

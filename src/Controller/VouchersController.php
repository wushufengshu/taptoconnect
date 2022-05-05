<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Vouchers Controller
 *
 * @property \App\Model\Table\VouchersTable $Vouchers
 * @method \App\Model\Entity\Voucher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VouchersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();

        //$vouchers = $this->paginate($this->Vouchers);
        $vouchers = $this->Vouchers->find()->order(['id' => 'desc'])->all();

            $voucher = $this->Vouchers->newEmptyEntity();
            if ($this->request->is('post') && isset($_POST['generate'])) {
                
                $voucher = $this->Vouchers->patchEntity($voucher, $this->request->getData());
                $quantity = $_POST['quantity'];
                $duration = $_POST['duration'];
                //dd($quantity);
                for ($i=0; $i < $quantity; $i++) { 

                    $voucher_code = $this->Vouchers->generate_vcode(); //call function from VouchersTable Model to generate unique code for voucher code
                    $status = 0;
                    $created = date('Y-m-d H:i:s');
                    $created_by = $this->request->getAttribute('identity')->getIdentifier();

                    $insertquery = $this->connection->execute("
                        INSERT INTO vouchers(
                       voucher_code,duration,status,created,created_by) 
                        SELECT * FROM 
                        (SELECT '$voucher_code') AS tmp1,
                        (SELECT '$duration') AS tmp2,
                        (SELECT '$status') AS tmp3,
                        (SELECT '$created') AS tmp4,
                        (SELECT '$created_by') AS tmp5
                        WHERE NOT EXISTS 
                        (SELECT 
                        voucher_code,duration,status,created,created_by
                        FROM 
                        vouchers 
                        WHERE 
                        voucher_code = '$voucher_code' 
                        )
                        ");
                }
                        if($insertquery) {
                        $this->Flash->success(__('Voucher Code data has been saved.'));
                        return $this->redirect(['controller' => 'Vouchers','action' => 'index']);//redirect to voucher main
                        }
                        else{
                        $this->Flash->error(__('Voucher Code data could not be saved. Please, try again.'));
                        }
                
            }

            if(isset($_POST['export_selected']) && isset($_POST['checked_item']) ){

                $checkboxes = $_POST['checked_item'];

                for($i = 0; $i < count($checkboxes); $i++){
           
                    $checked_item = $_POST['checked_item'][$i];

                        $voucher_list = $this->Vouchers
                        ->find()
                        ->select([
                            'id', 'voucher_code', 'duration', 'status', 'created'
                        ])
                        ->where(['id' => $checked_item])
                        ->all();

                        $delimiter = ","; 
                        $f = fopen('php://output', 'w');

                        $flag = false;
                        foreach ($voucher_list as $key => $value) {

                        $arr =array(
                            'Id' => $value['id'],
                            'Voucher Code' => $value['voucher_code'],
                            'Duration (In Months)' => $value['duration'],
                            'Status - 0-Available/1-Used' => $value['status'], 
                            'Created' => $value['created']);
                        
                        if(!$flag) { 
                           // display field/column names as first row 
                           fputcsv($f, array_keys($arr), ',', '"');
                           $flag = true; 
                         } 

                        fputcsv($f, array_values($arr), ',', '"');

                        //$lineData = array($value['id'],$value['voucher_code'], $value['status'], $value['created']); 
                        //fputcsv($f, $lineData, $delimiter);
                        
                        }
                        fclose($f) or die("Can't close php://output");

                        $filename = "VOUCHER_DATA_".date("Y_m_d_H_i_s").".csv";
                       // Set headers to download file rather than displayed 
                        header('Content-Type: text/csv'); 
                        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
        
                  }
                  exit();
            }

        $this->set(compact('vouchers','voucher'));
    }

    public function exportcsv(){

        $this->Authorization->skipAuthorization();

        $filename = "VOUCHERS_DATA_".date("Y_m_d_H_i_s").".csv";
        $this->response = $this->response->withDownload($filename);
        $vouchers = $this->Vouchers->find()->all();
        $_serialize = 'vouchers';
        $_header = ['Voucher Code', 'Duration (In Months)', 'Status - 0-Available/1-Used', 'Created'];
        $_extract = ['voucher_code','duration', 'status', 'created'];

        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('vouchers', '_serialize', '_header', '_extract'));
    }

    /**
     * View method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $voucher = $this->Vouchers->get($id, [
            'contain' => ['UserCards'],
        ]);

        $this->set(compact('voucher'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();

        $voucher = $this->Vouchers->newEmptyEntity();
        if ($this->request->is('post')) {
            $voucher = $this->Vouchers->patchEntity($voucher, $this->request->getData());
            $voucher->created_by = $this->request->getAttribute('identity')->getIdentifier();
            if ($this->Vouchers->save($voucher)) {
                $this->Flash->success(__('The voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The voucher could not be saved. Please, try again.'));
        }
        $this->set(compact('voucher'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        
        $voucher = $this->Vouchers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voucher = $this->Vouchers->patchEntity($voucher, $this->request->getData());
            if ($this->Vouchers->save($voucher)) {
                $this->Flash->success(__('The voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The voucher could not be saved. Please, try again.'));
        }
        $this->set(compact('voucher'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        
        $this->request->allowMethod(['post', 'delete']);
        $voucher = $this->Vouchers->get($id);
        if ($this->Vouchers->delete($voucher)) {
            $this->Flash->success(__('The voucher has been deleted.'));
        } else {
            $this->Flash->error(__('The voucher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}

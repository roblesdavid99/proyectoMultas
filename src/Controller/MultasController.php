<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\I18n\FrozenDate;

/**
 * Multas Controller
 *
 * @property \App\Model\Table\MultasTable $Multas
 * @method \App\Model\Entity\Multa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MultasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function calcularMulta()
    {              
        $prestamosTable = $this->getTableLocator()->get('Prestamos'); 
        $query = $prestamosTable->find('list');              
        $prestamos = $query->toArray();
        foreach($prestamos as $prestamos)
        {
            $prestamo = $prestamosTable->get($prestamos);
            if($prestamo->fechaEntrega == '')
            {                               
                $hoy = new FrozenDate();                
                if($hoy > $prestamo->fechaFin)
                {
                    $mora = $hoy->diff($prestamo->fechaFin);                     
                    $mora = $mora->days;  
                    $total = 5;
                    $total = $total * $mora;
                    $query1 = $this->Multas->findByUsuario($prestamo->usuario);
                    $busqueda = $query1->toArray();
                    $tableMultas = $this->getTableLocator()->get('Multas'); 
                    $tableEquipos = $this->getTableLocator()->get('Equipos');
                    $equipo = $tableEquipos->get($prestamo->equipo_id);
                    if(empty($busqueda))
                    {                        
                        $nuevaMulta = $tableMultas->newEmptyEntity();
                        $nuevaMulta->nombreEquipo = $equipo->nombre;
                        $nuevaMulta->usuario = $prestamo->usuario;
                        $nuevaMulta->multa = $total;
                        $nuevaMulta->prestamo_id = $prestamo->id;
                        $tableMultas->save($nuevaMulta);                        
                    }else{
                        $nuevaMulta = $tableMultas->get($busqueda[0]['id']);
                        $nuevaMulta->nombreEquipo = $equipo->nombre;
                        $nuevaMulta->usuario = $prestamo->usuario;
                        $nuevaMulta->multa = $total;
                        $nuevaMulta->prestamo_id = $prestamo->id;
                        $tableMultas->save($nuevaMulta);
                    }                   
                }
            }else
            {
                $prestamo -> estado = 'devuelto';
                $prestamosTable->save($prestamo);
            }            
        }        
        return $this->redirect(['action' => 'index']); 
    }

    public function index()
    {   
        $fechaIn = $this->request->getQuery('fechaIn');
        $fechaFin = $this->request->getQuery('fechaFin');
        if($fechaIn && $fechaFin){            
            $conditions = array(
                'conditions' => array(
                'and' => array(
                                array('Multas.created >= ' => $fechaIn,
                                    'Multas.created <= ' => $fechaFin
                                    )                    
                    )));
            $query = $this->Multas->find('all', $conditions);
        }else{
            $query = $this->Multas;
        }        

        $this->paginate = [
            'contain' => ['Prestamos'],
        ];
        $multas = $this->paginate($query);

        $this->set(compact('multas'));
    }

    /**
     * View method
     *
     * @param string|null $id Multa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $multa = $this->Multas->get($id, [
            'contain' => ['Prestamos'],
        ]);

        $this->set(compact('multa'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $multa = $this->Multas->newEmptyEntity();
        if ($this->request->is('post')) {
            $multa = $this->Multas->patchEntity($multa, $this->request->getData());
            if ($this->Multas->save($multa)) {
                $this->Flash->success(__('The multa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multa could not be saved. Please, try again.'));
        }
        $prestamos = $this->Multas->Prestamos->find('list', ['limit' => 200])->all();
        $this->set(compact('multa', 'prestamos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Multa id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $multa = $this->Multas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $multa = $this->Multas->patchEntity($multa, $this->request->getData());
            if ($this->Multas->save($multa)) {
                $this->Flash->success(__('The multa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multa could not be saved. Please, try again.'));
        }
        $prestamos = $this->Multas->Prestamos->find('list', ['limit' => 200])->all();
        $this->set(compact('multa', 'prestamos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Multa id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $multa = $this->Multas->get($id);
        if ($this->Multas->delete($multa)) {
            $this->Flash->success(__('The multa has been deleted.'));
        } else {
            $this->Flash->error(__('The multa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}

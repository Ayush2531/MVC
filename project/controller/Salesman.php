<?php
/**
 * 
 */
class Controller_Salesman extends Controller_Core_Action
{
	
	public function gridAction()
	{

		try {
			$query = "SELECT * FROM `salesman`";
			$salesmans = Ccc::getModel('salesman_Row')->fetchAll($query);
			// print_r($salesmans);

			$this->getView()->setTemplate('salesman/grid.phtml')->setData(['salesmans' => $salesmans])->render();
			
		} catch (Exception $e) {
			
		}
	}

	public function addAction()
	{
		try {
			$salesman =  Ccc::getModel('salesman_Row');
			$this->getView()
				->setTemplate('salesman/edit.phtml')
				->setData(['salesman' => $salesman]);
			$this->render();
		} catch (Exception $e) {
			
		}
	}

	public function deleteAction()
	{
		try {
			$this->getMessage()->getSession()->start();
			if (!($id = (int) $this->getRequest()->getParam('id'))) {
				throw new Exception("Invalid request.", 1);
			}

			if (!($salesman =  Ccc::getModel('salesman_Row')->load($id))) {
				throw new Exception("Invalid Id.", 1);
			}

			if (!$salesman->delete()) {
				throw new Exception("Unable to delete.", 1);
			}

			$this->getMessage()->addMessage('Data deleted successfully.');
		} catch (Exception $e) {
			$this->getMessage()->addMessage($e->getMessage(),Model_Core_Message::FAILURE);
		}

		$this->redirect('grid', null, [], true);
	}

	public function saveAction()
	{
		try {
			$this->getMessage()->getSession()->start();
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid request.", 1);
			}

			if (!($postData = $this->getRequest()->getPost('salesman'))) {
				throw new Exception("Invalid data posted.", 1);
			}

			if ($id = (int) $this->getRequest()->getParam('id')) {
				if (!($salesman =  Ccc::getModel('salesman_Row')->load($id))) {
					throw new Exception("Invalid Id.", 1);
				}

				$salesman->updated_at = date("y-m-d H:i:s");
			}
			else {
				$salesman =  Ccc::getModel('salesman_Row');
				$salesman->created_at = date("y-m-d H:i:s");
			}

			if (!$salesman->setData($postData)->save()) {
				throw new Exception("Unable to save.", 1);
			}

			$this->getMessage()->addMessage('Data saved successfully.');
		} catch (Exception $e) {
			$this->getMessage()->addMessage($e->getMessage(),Model_Core_Message::FAILURE);
		}
		
		$this->redirect('grid', null, [], true);
	}

	public function editAction()
	{
		try {
			$this->getMessage()->getSession()->start();
			if (!($id = (int) $this->getRequest()->getParam('id'))) {
				throw new Exception("Invalid request.", 1);
			}

			if (!($salesman =  Ccc::getModel('salesman_Row')->load($id))) {
				throw new Exception("Invalid Id.", 1);
			}

			$this->getView()
				->setTemplate('salesman/edit.phtml')
				->setData(['salesman' => $salesman]);
			$this->render();
		} catch (Exception $e) {
			$this->getMessage()->addMessage($e->getMessage(),Model_Core_Message::FAILURE);
			$this->redirect('grid');
		}
	}
		
		
	
}
?>
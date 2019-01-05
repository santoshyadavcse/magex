<?php
namespace MageEx\OfferCoupon\Model\Plugin;

use Magento\Sales\Model\Order;

class OrderStatePlugin 
{
	protected $logger;
	 protected $couponGenerator;
	
  public function __construct( \Psr\Log\LoggerInterface $logger,
  \Magento\SalesRule\Model\CouponGenerator $couponGenerator
)
  {
	   $this->couponGenerator = $couponGenerator;
    $this->_logger = $logger;
  }
  
	public function afterSave(
		\Magento\Sales\Api\OrderRepositoryInterface $subject,
		$result
	) {
		
		
		 $this->_logger->debug('Order state'.$result->getState()); 
		//if($result->getState() == Order::STATE_COMPLETE) {
		    $this->_logger->debug('Order state info'.$result->getState()); 
			

			$this->couponGenerator->generateCodes($params);
 
		//}
		
		
		
		return $result;
	}
	
	public function _generateCouponCode() {
		
		
		
			$params['rule_id'] = 5;
			$params['qty'] = 1;
			$params['length'] = 12;
			$params['format'] = 'alphanum';

			$this->couponGenerator->generateCodes($params);
 
	}

}
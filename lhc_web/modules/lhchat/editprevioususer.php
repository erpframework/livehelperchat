<?php 

try {
	$chat = erLhcoreClassChat::getSession()->load( 'erLhcoreClassModelChat', $Params['user_parameters']['chat_id']);
  
	if ($chat->hash == $Params['user_parameters']['hash'] && ($chat->status == erLhcoreClassModelChat::STATUS_PENDING_CHAT || $chat->status == erLhcoreClassModelChat::STATUS_ACTIVE_CHAT))
	{			
		$lastMessage = erLhcoreClassChat::getGetLastChatMessageEdit($chat->id,0);
		
		if (isset($lastMessage['msg'])) {
			
			$array['id'] = $lastMessage['id'];
			$array['msg'] = $lastMessage['msg'];
			$array['error'] = 'f';
			
			echo json_encode($array);	
			exit;		
		};
	}
	
} catch (Exception $e) {

}

echo json_encode(array('error' => 't'));	 

exit;
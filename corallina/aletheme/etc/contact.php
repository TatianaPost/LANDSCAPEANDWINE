<?php
class Aletheme_WP_Mail_From
{
	protected $name;
	
	protected $email;
	
	public function __construct($name = '', $email = '') {
		$this->setEmail($email)->setName($name);
		
	}
	
	public function setEmail($value) {
		$this->email = $value;
		return $this;
	}
	
	public function setName($value) {
		$this->name = $value;
		return $this;
	}
	
	public function filterEmailFrom($content_type) {
		return $this->email;
	}

	public function filterNameFrom($name) {
		return $this->name;
	}
	
	public function addFilters()
	{
		add_filter('wp_mail_from', array($this, 'filterEmailFrom'));
		add_filter('wp_mail_from_name', array($this, 'filterNameFrom'));
		
		return $this;
	}
}
$ale_mail_from = new Aletheme_WP_Mail_From();

/**
 * Send Contact Message
 * 
 * @param array $data
 * @return mixed
 * @throws Exception 
 */
function ale_send_contact($data) {
	$return = true;
	
	try {
		
		if (!wp_verify_nonce($_REQUEST['_wpnonce'])) {
			throw new Exception('Something went wrong. Please refresh the page and try again.');
		}
		
		foreach ($data as $k => $val) {
			$data[$k] = wp_filter_nohtml_kses(trim($val));
		}

		if (!is_email($data['email'])) {
			throw new Exception('Please enter a valid email address.');
		}
		
		if (!$data['name']) {
			throw new Exception('Please enter your first name.');
		}

		if (!$data['message']) {
			throw new Exception('Please enter your message.');
		}
		
		do_action('ale_contact_form_send', $data);
		
		$redirectUrl = get_permalink();
		$redirectUrl = substr_count($redirectUrl, '?') ? '&success' : '?success';
		wp_redirect($redirectUrl);
		exit;
		
		
	} catch (Exception $e) {
		$return = array(
			'error' => 1,
			'msg'   => $e->getMessage(),
		);
	}
	
	return $return;
}


/**
 * Send Contact Form Email
 * 
 * @param array $data 
 */
function ale_contact_email_send($data) {
	global $ale_mail_from;
	try {
		$blog = get_bloginfo('name');

		if(isset($data['title'])){
			$title = "Tour: ".$data['title'];
		}

		if(isset($data['name'])){
			$name = "Name: ".$data['name'];
		}

		if(isset($data['last-name'])){
			$last_name = "Last-name: ".$data['last-name'];
		}

		if(isset($data['last-name'])){
			$country = "Country: ".$data['country'];
		}

		if(isset($data['address'])){
			$address = "Address: ".$data['address'];
		}

		if(isset($data['phone'])){
			$phone = "Phone: ".$data['phone'];
		}

		if(isset($data['email'])){
			$email = "Email: ".$data['email'];
		}

		if(isset($data['date'])){
			$date = "Date: ".$data['date'];
		}

		if(isset($data['adults'])){
			$adults = "Adults: ".$data['adults'];
		}

		$subject = 'New contact message from ' . $blog;
		$body = "
			{$title}

			{$name}

			{$last_name}

			{$country}

			{$address}

			{$phone}

			{$email}

			{$date}

			{$adults}


			Message:

			{$data['message']}


			------------


			Sent from {$blog}
		";

		$ale_mail_from->setName($data['name'])->setEmail($data['email'])->addFilters();
			
		wp_mail(get_option('admin_email'), $subject, $body);
	} catch (Exception $e) {
		
	}
}
add_action('ale_contact_form_send', 'ale_contact_email_send');

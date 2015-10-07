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
		
		
		// PREPARE THE BODY OF THE MESSAGE

			$imageheader = '<html><body>';
			$imageheader .= '<img src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/05/mail-header.jpg" alt="Website Change Request" />';
			$imageheader .= "</body></html>";
	
		
		$blog = get_bloginfo('name');

		if(isset($data['title'])){
			
			$title = '<html><body>';
			$title .= "Tour: ".$data['title'];
			$title .= "</body></html>";
		}

		if(isset($data['name'])){
			$name = '<html><body>';
			$name .= "Nombre: ".$data['name'];
			$name .= "</body></html>";
		}

		if(isset($data['last-name'])){
			$last_name = '<html><body>';
			$last_name .= "Apellido: ".$data['last-name'];
			$last_name .= "</body></html>";
		}

		if(isset($data['last-name'])){
			$country = '<html><body>';
			$country .= "Pais: ".$data['country'];
			$country .= "</body></html>";
		}

		if(isset($data['address'])){
			$address = '<html><body>';
			$address .= "Ciudad: ".$data['address'];
			$address .= "</body></html>";
		}

		if(isset($data['phone'])){
			$phone = '<html><body>';
			$phone .= "Telefono: ".$data['phone'];
			$phone .= "</body></html>";
		}

		if(isset($data['email'])){
			$email = '<html><body>';
			$email .= "Email: ".$data['email'];
			$email .= "</body></html>";
		}

		if(isset($data['date'])){
			$date = '<html><body>';
			$date .= "Fecha: ".$data['date'];
			$date .= "</body></html>";
		}

		if(isset($data['adults'])){
			$adults = '<html><body>';
			$adults .= "Adultos: ".$data['adults'];
			$adults .= "</body></html>";
		}
		
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";

		$subject = 'CONTACTO WEB ' . $blog;

		$body = "
		
			{$imageheader}
			
			&nbsp;
		
			{$title}

			{$name}

			{$last_name}

			{$country}

			{$address}

			{$phone}

			{$email}

			{$date}

			{$adults}


			Mensaje:

			{$data['message']}
			
			&nbsp;
			
			------------


			Enviado desde {$blog}
		";

		$ale_mail_from->setName($data['name'])->setEmail($data['email'])->addFilters();
			
		wp_mail(get_option('admin_email'), $subject, $body, $headers);
	} catch (Exception $e) {
		
	}
}
add_action('ale_contact_form_send', 'ale_contact_email_send');

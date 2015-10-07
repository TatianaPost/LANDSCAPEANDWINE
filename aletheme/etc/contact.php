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
			$imageheader .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$imageheader .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['req-name']) . "</td></tr>";
			$imageheader .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['req-email']) . "</td></tr>";
			$imageheader .= "<tr><td><strong>Type of Change:</strong> </td><td>" . strip_tags($_POST['typeOfChange']) . "</td></tr>";
			$imageheader .= "<tr><td><strong>Urgency:</strong> </td><td>" . strip_tags($_POST['urgency']) . "</td></tr>";
			$imageheader .= "<tr><td><strong>URL To Change (main):</strong> </td><td>" . $_POST['URL-main'] . "</td></tr>";
			$addURLS = $_POST['addURLS'];
			if (($addURLS) != '') {
			    $imageheader .= "<tr><td><strong>URL To Change (additional):</strong> </td><td>" . strip_tags($addURLS) . "</td></tr>";
			}
			$curText = htmlentities($_POST['curText']);           
			if (($curText) != '') {
			    $message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>" . $curText . "</td></tr>";
			}
			$imageheader .= "<tr><td><strong>NEW Content:</strong> </td><td>" . htmlentities($_POST['newText']) . "</td></tr>";
			$imageheader .= "</table>";
			$imageheader .= "</body></html>";
	
		
		$blog = get_bloginfo('name');

		if(isset($data['title'])){
			$title = "Tour: ".$data['title'];
		}

		if(isset($data['name'])){
			$name = "Nombre: ".$data['name'];
		}

		if(isset($data['last-name'])){
			$last_name = "Apellido: ".$data['last-name'];
		}

		if(isset($data['last-name'])){
			$country = "País: ".$data['country'];
		}

		if(isset($data['address'])){
			$address = "Ciudad: ".$data['address'];
		}

		if(isset($data['phone'])){
			$phone = "Telefono: ".$data['phone'];
		}

		if(isset($data['email'])){
			$email = "Email: ".$data['email'];
		}

		if(isset($data['date'])){
			$date = "Fecha: ".$data['date'];
		}

		if(isset($data['adults'])){
			$adults = "Adultos: ".$data['adults'];
		}
		
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$subject = 'CONTACTO test ' . $blog;

		$body = "
			{$title}
			
			{$imageheader}

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


			Enviado {$blog}
		";

		$ale_mail_from->setName($data['name'])->setEmail($data['email'])->addFilters();
			
		wp_mail(get_option('admin_email'), $subject, $body, $headers);
	} catch (Exception $e) {
		
	}
}
add_action('ale_contact_form_send', 'ale_contact_email_send');

<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Extension_Contact_Forms extends FW_Extension_Forms_Form {

	public function _init() {
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_form_builder_type() {
		return 'form-builder';
	}

	public function get_form_builder_value( $form_id ) {

		$form = $this->get_db_data( $this->get_name() . '-' . $form_id );

		return ( empty( $form['form'] ) ? array() : $form['form'] );
	}

	public function render( $data ) {
		$form = $data['form'];

		if ( empty( $form ) ) {
			return '';
		}

		$form_id = $data['id'];
		$this->set_db_data( $this->get_name() . '-' . $form_id, $data );

		return $this->render_view(
			'form',
			array(
				'form_id'   => $form_id,
				'form_html' => fw_ext( 'forms' )->render_form(
					$form_id, $form, $this->get_name(),
					$submit_button = $this->render_view(
						'submit',
						array(
							'submit_button_text' => empty( $data['submit_button_text'] )
								? __( 'Submit', 'fw' ) :
								$data['submit_button_text'],
							'form_id'            => $form_id
						)
					)
				)
			)
		);
	}

	public function process_form( $form_values, $data ) {
		$flash_id = 'fw_ext_contact_form_process';

		if ( empty( $form_values ) ) {
			FW_Flash_Messages::add(
				$flash_id,
				__( 'Unable to process the form', 'fw' ),
				'error'
			);

			return;
		}

		$form_id = FW_Request::POST( 'fw_ext_forms_form_id' );

		if ( empty( $form_id ) ) {
			FW_Flash_Messages::add(
				$flash_id,
				__( 'Unable to process the form', 'fw' ),
				'error'
			);
		}

		$form = $this->get_db_data( $this->get_name() . '-' . $form_id );

		if ( empty( $form ) ) {
			FW_Flash_Messages::add(
				$flash_id,
				__( 'Unable to process the form', 'fw' ),
				'error'
			);
		}

		$to = $form['email_to'];

		if ( ! filter_var( $to, FILTER_VALIDATE_EMAIL ) ) {
			FW_Flash_Messages::add(
				$flash_id,
				__( 'Invalid destination email (please contact the site administrator)', 'fw' ),
				'error'
			);

			return;
		}

		$entry_data = array(
			'form_values'       => $form_values,
			'shortcode_to_item' => $data['shortcode_to_item'],
		);

		$result = fw_ext_mailer_send_mail(
			$to,
			$this->get_db_data( $this->get_name() . '-' . $form_id . '/subject_message', '' ),
			$this->render_view( 'email', $entry_data ),
			$entry_data
		);

		if ( $result['status'] ) {
			FW_Flash_Messages::add(
				$flash_id,
				$this->get_db_data( $this->get_name() . '-' . $form_id . '/success_message',
					__( 'Message sent!', 'fw' ) ),
				'success'
			);
		} else {
			FW_Flash_Messages::add(
				$flash_id,
				$this->get_db_data( $this->get_name() . '-' . $form_id . '/failure_message',
					__( 'Oops something went wrong.', 'fw' ) )
				. ' <em style="color:transparent;">' . $result['message'] . '</em>',
				'error'
			);
		}
	}

	/**
	 * @internal
	 */
	public function _action_post_form_type_save() {
		if ( ! fw_ext_mailer_is_configured() ) {
			FW_Flash_Messages::add(
				'fw-ext-forms-' . $this->get_form_type() . '-mailer',
				str_replace(
					array(
						'{mailer_link}'
					),
					array(
						// the fw()->extensions->manager->get_extension_link() method is available starting with v2.1.7
						version_compare( fw()->manifest->get_version(), '2.1.7', '>=' )
							? fw_html_tag( 'a',
							array( 'href' => fw()->extensions->manager->get_extension_link( 'forms' ) ),
							__( 'Mailer', 'fw' ) )
							: __( 'Mailer', 'fw' )
					),
					__( 'Please configure the {mailer_link} extension.', 'fw' )
				),
				'error'
			);
		}
	}

	/**
	 * Returns value of the form option
	 *
	 * @param string $id
	 * @param null|string $multikey
	 *
	 * @return mixed|null
	 */
	public function get_option( $id, $multikey = null ) {
		$form = $this->get_db_data( $this->get_name() . '-' . $id );

		if ( empty( $form ) ) {
			return null;
		}

		if ( is_null( $multikey ) ) {
			return $form;
		}

		return fw_akg( $multikey, $form );
	}
}

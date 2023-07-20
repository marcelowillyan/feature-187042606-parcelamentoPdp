<?php
wp_enqueue_script( 'wc-credit-card-form' );

$fields = array();

$cvc_field = '<p class="form-row form-row-last">
			<label for="' . esc_attr( $this->id ) . '-card-cvc">' . esc_html__( 'Card code', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label>
			<input id="' . esc_attr( $this->id ) . '-card-cvc" class="input-text wc-credit-card-form-card-cvc" inputmode="numeric" autocomplete="off" autocorrect="no" autocapitalize="no" spellcheck="no" type="tel" maxlength="4" placeholder="' . esc_attr__( 'CVC', 'woocommerce' ) . '" ' . $this->field_name( 'card-cvc' ) . ' style="width:100px" />
		</p>';

$default_fields = array(
    'card-holer-name' => '<p class="form-row form-row-wide">
				<label for="' . esc_attr( $this->id ) . '-card-holder">' . esc_html__( 'Titular do Cartão', RM_PagSeguro\Connect::DOMAIN ) . '&nbsp;<span class="required">*</span></label>
				<input id="' . esc_attr( $this->id ) . '-card-holder-name" class="input-text wc-credit-card-form-holder-name" autocomplete="cc-name" autocorrect="no" autocapitalize="characters" spellcheck="no" type="text" placeholder="' . esc_html__( 'JOSÉ DA SILVA', RM_PagSeguro\Connect::DOMAIN ) . '" ' . $this->field_name( 'card-holder-name' ) . ' />
			</p>',
    'card-number-field' => '<p class="form-row form-row-wide">
                    <label for="' . esc_attr( $this->id ) . '-card-number">' . esc_html__( 'Card number', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label>
                    <input id="' . esc_attr( $this->id ) . '-card-number" class="input-text wc-credit-card-form-card-number" inputmode="numeric" autocomplete="cc-number" autocorrect="no" autocapitalize="no" spellcheck="no" type="tel" placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;" ' . $this->field_name( 'card-number' ) . ' />
                </p>',
    'card-expiry-field' => '<p class="form-row form-row-first">
				<label for="' . esc_attr( $this->id ) . '-card-expiry">' . esc_html__( 'Expiry (MM/YY)', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label>
				<input id="' . esc_attr( $this->id ) . '-card-expiry" class="input-text wc-credit-card-form-card-expiry" inputmode="numeric" autocomplete="cc-exp" autocorrect="no" autocapitalize="no" spellcheck="no" type="tel" placeholder="' . esc_attr__( 'MM / YY', 'woocommerce' ) . '" ' . $this->field_name( 'card-expiry' ) . ' />
			</p>',
);

if ( ! $this->supports( 'credit_card_form_cvc_on_saved_method' ) ) {
    $default_fields['card-cvc-field'] = $cvc_field;
}

$fields = wp_parse_args( $fields, apply_filters( 'woocommerce_credit_card_form_fields', $default_fields, $this->id ) );
?>

    <fieldset id="wc-<?php echo esc_attr( $this->id ); ?>-cc-form" class='wc-credit-card-form wc-payment-form'>
        <?php do_action( 'woocommerce_credit_card_form_start', $this->id ); ?>
        <?php
        foreach ( $fields as $field ) {
            echo $field; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
        }
        ?>
        <input type="hidden" <?php echo $this->field_name('card-encrypted');?>" id="<?php echo esc_attr( $this->id )?>-card-encrypted" />
        <?php do_action( 'woocommerce_credit_card_form_end', $this->id ); ?>
        <div class="clear"></div>
    </fieldset>
<?php

if ( $this->supports( 'credit_card_form_cvc_on_saved_method' ) ) {
    echo '<fieldset>' . $cvc_field . '</fieldset>'; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
}
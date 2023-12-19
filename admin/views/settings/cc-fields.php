<?php
if ( ! defined ( 'ABSPATH' ) ) {
    exit;
}

use RM_PagBank\Connect;

return array(
	'cc_enabled'                                 => [
		'title'       => __('Habilitar', 'pagbank-connect'),
		'label'       => __('Habilitar', 'pagbank-connect'),
		'type'        => 'checkbox',
		'description' => '',
		'default'     => 'yes',
	],
	'cc_installment_options'                     => [
		'title'   => __('Opções de Parcelamento', 'pagbank-connect'),
		'type'    => 'select',
		'description'    => __('<a href="https://pagsegurotransparente.zendesk.com/hc/pt-br/articles/19945359660173-'
            .'Op%C3%A7%C3%B5es-de-Parcelamento" target="_blank">Saiba mais</a>', 'pagbank-connect'),
        'desc_tip'  => false,
		'options' => [
			'external'  => __('Obedecer configurações da conta PagBank (padrão)', 'pagbank-connect'),
			'buyer'     => __('Juros por conta do comprador', 'pagbank-connect'),
			'fixed'     => __('Até X parcelas sem juros', 'pagbank-connect'),
			'min_total' => __('Até X parcelas sem juros dependendo do valor da parcela', 'pagbank-connect'),
		],
	],
	'cc_installment_options_fixed'               => [
		'title'             => __('Número de Parcelas sem Juros', 'pagbank-connect'),
		'type'              => 'number',
		'desc'              => '',
		'default'           => 3,
		'custom_attributes' => [
			'min' => 1,
			'max' => 18,
		],
	],
	'cc_installments_options_min_total'          => [
		'title'             => __('Valor Mínimo da Parcela sem Juros', 'pagbank-connect'),
		'type'              => 'number',
		'description'       => __(
			'Valor inteiro sem decimais. Exemplo: 10 para R$ 10,00 <br/><small>Neste exemplo, um pedido '
			.'de R$100 poderá ser parcelado em 10x sem juros.<br/>Taxa padrão de juros: '
			.'2,99% a.m (consulte valor atualizado).</small>',
			'pagbank-connect'
		),
		//        'desc_tip' => true,
		'default'           => 50,
		'custom_attributes' => [
			'min' => 5,
			'max' => 99999,
		],
	],
	'cc_installments_options_limit_installments' => [
		'title'       => __('Limitar parcelas?', 'pagbank-connect'),
		'type'        => 'select',
		'description' => __(
			'Recomendação: Não impeça seu cliente de comprar com um parcelamento elevado mesmo que ele '
			.'queira assumir os juros.<br/>Não há um custo maior pra você.',
			'pagbank-connect'
		),
		'options'     => [
			'no'  => __('Não (recomendável)', 'pagbank-connect'),
			'yes' => __('Sim', 'pagbank-connect'),
		],
	],

	'cc_installments_options_max_installments' => [
		'title'             => __('Número Máximo de Parcelas', 'pagbank-connect'),
		'type'              => 'number',
		'default'           => 18,
		'custom_attributes' => [
			'min' => 1,
			'max' => 18,
		],
	],

	'cc_soft_descriptor' => [
		'title'             => __('Identificador na Fatura', 'pagbank-connect'),
		'type'              => 'text',
		'default'           => 'CompraViaPagBank',
		'description'       => __(
			'Nome que será exibido na fatura do Cliente. <br/>'
			.'Escolha um nome que faça o cliente lembrar que comprou na sua loja e evite chargebacks. <br/>'
			.'Algumas empresas de cartão podem exibir somente os 13 primeiros caracteres. <a href="https://'
            .'pagsegurotransparente.zendesk.com/hc/pt-br/articles/19945038495629-Identificador-na-fatura" '
            .'target="_blank">Saiba mais</a>.',
			'pagbank-connect'
		),
		'desc_tip'          => false,
		'custom_attributes' => [
			'maxlength' => 17,
		],
	],
    'cc_3ds'                                 => [
        'title'       => __('Autenticação 3D', 'pagbank-connect'),
        'label'       => __('Habilitar', 'pagbank-connect'),
        'type'        => 'checkbox',
        'description' => 'Habilita a autenticação 3D Secure para compras com cartão de crédito. <br/>'
            .'A autenticação 3D Secure é um protocolo de segurança que adiciona uma camada extra de proteção '
            .'para compras online, <br/> e evita que chargebacks de compras não reconhecidas sejam cobrados do lojista. <br/>'
            .'Para mais informações, consulte a <a href="https://dev.pagbank.uol.com.br/docs/'
            .'cobrando-com-autenticacao-3ds" target="_blank">documentação</a>.',
        'default'     => 'yes',
    ],
    'cc_3ds_allow_continue'                                 => [
        'title'       => __('Quando 3D não for suportado', 'pagbank-connect'),
        'label'       => __('Permitir concluir', 'pagbank-connect'),
        'type'        => 'checkbox',
        'description' => 'Alguns cartões não possuem suporte a autenticação 3D. <br/>'
            .'Ao marcar esta opção, o cliente poderá concluir a compra mesmo que o cartão não suporte tal recurso.',
        'default'     => 'no',
    ],
);

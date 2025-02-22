<?php
// setup.php (run once to populate database)
require_once __DIR__ . '/models/PaymentFeature.php';

$paymentFeature = new PaymentFeature();
$initialData = [
    ['images/Earth.svg', 'Access up to $100,000', 'We fund each invoice once approved and collect payment to optimise your cash flow.*'],
    ['images/Earth.svg', 'You choose invoices to get paid', 'Self-serve online portal available 24/7 or connect from your CRM or invoicing platform.'],
    ['images/Earth.svg', 'Simple pricing', 'Only pay for what you use, if you don’t need us, there are no costs.'],
    ['images/Earth.svg', 'Click and quick', 'We fund each invoice once approved and collect payment to optimise your cash flow.*'],
    ['images/Earth.svg', 'Flexible', 'Self-serve online portal available 24/7 or connect from your CRM or invoicing platform.'],
    ['images/Earth.svg', 'Invest in your business', 'Only pay for what you use, if you don’t need us, there are no costs.']
];

foreach ($initialData as $data) {
    $paymentFeature->addFeature($data[0], $data[1], $data[2]);
}
echo "Initial data inserted successfully!";
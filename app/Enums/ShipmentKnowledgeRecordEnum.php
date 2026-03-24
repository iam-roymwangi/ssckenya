<?php
namespace App\Enums;

enum ShipmentKnowledgeRecordEnum: string
{
    case ORDER_CONFIRMED = 'order_confirmed';
    case CONTRACT_ISSUED = 'contract_issued';
    case GOLD_PREPARED = 'gold_prepared';
    case REFINERY_VERIFICATION = 'refinery_verification';
    case ASSAY_TESTING = 'assay_testing';
    case PAYMENT_RELEASE = 'payment_release';
    case EXPORT_CLEARANCE = 'export_clearance';
    case SHIPMENT_DISPATCHED = 'shipment_dispatched';
    case DELIVERY_COMPLETED = 'delivery_completed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
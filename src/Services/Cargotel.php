<?php

namespace Cargotel\Services;
use Carbon\Carbon;

class Cargotel
{
    protected $config = [];
    protected $client;

    public function __construct($config)
    {
        $this->config = $config;

        $this->client = guzzle([
            'base_uri' => $this->config['base_uri'],
            'auth' => [
                $this->config['username'],
                $this->config['password'],
            ]
        ]);
    }

    public function setOrderEta($order_id, $datetime, $timezone = 'UTC')
    {
        return $this->makeJsonRpcCall('setETA', [
            'order_id' => $order_id,
            'date' => Carbon::parse($datetime)->toIso8601String(),
            'time_zone' => $timezone
        ]);
    }

    public function setOrderDueDate($order_id, $datetime, $timezone = 'UTC')
    {
        return $this->makeJsonRpcCall('setDueDate', [
            'order_id' => $order_id,
            'date' => Carbon::parse($datetime)->toIso8601String(),
            'time_zone' => $timezone
        ]);
    }

    protected function makeJsonRpcCall($method, $params, $http_method = 'POST')
    {
        return $this->client->request(
            $http_method,
            $this->config['services_url'],
            [
                'body' => json_encode([
                    'method' => $method,
                    'params' => [$params]
                ])
            ]
        );
    }
}

//displayDriver,CreateOrder,CancelOrder,HelloWorld,UnassignCarrier,CreateDriver,CloseProject,getCountryStateSelect,EhubStatus,DeleteFlag,LookupOrder,selectDates,getDriverSelect,CreateTruck,getClientInfo,addComment,SetCreditStatus,SetDryRun,setScheduledPickupDate,editClient,checkVin,FetchNotes,getCarrierSelect,setDueDate,GetInspectionEntries,getEligibleCarriers,validLoadTextField,getTruckSelect,getPrice,dlroWolleH,addEvent,CreateNote,fetchMiles,SetNetworkCreditStatus,GetDocumentURL,markReceived,setDeliveryDate,GoodbyeCruelWorld,setActualPickupDate,LookupProject,setRedemptionDate,LoadAccessCheck,SetProjectEmail,UploadSignatureImage,UnSetCarrier,UploadInspectionImage,createClient,getEligibleCarriersVendors,getRecentObjects,CreateProject,showOrderDetails,displayTruck,AddInspectionEntry,OrderStatus,getAddNewClientForm,SetCarrier,getClientSearchForm,notifyStatusChange,DeleteInspectionEntry,getClientMore,getEditClientForm,CreateUser,lookupRates,setETA,setPendingPickupStatusDate,SetFlag,getShipperSelect

<?php

namespace Mackensiealvarezz\Plaid\Api;

class Product extends Api
{
    public function getAuth($accessToken, $options = [])
    {
        return $this->client->postWithAuth('/auth/get', [
            'access_token' => $accessToken,
            'options' => $options
        ]);
    }

    public function getTransactions($accessToken, $startDate, $endDate, $options = [])
    {
        return $this->client->postWithAuth('/transactions/get', [
            'access_token' => $accessToken,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'options' => $options,
        ]);
    }

    public function getBalance($accessToken, $options = [])
    {
        return $this->client->postWithAuth('/accounts/balance/get', [
            'access_token' => $accessToken,
            'options' => $options
        ]);
    }

    public function getIdentity($accessToken)
    {
        return $this->client->postWithAuth('/identity/get', [
            'access_token' => $accessToken,
        ]);
    }

    public function getIncome($accessToken)
    {
        return $this->client->postWithAuth('/income/get', [
            'access_token' => $accessToken,
        ]);
    }

    public function getAssetReport($assetReportToken, $includeInsights = false)
    {
        return $this->client->postWithAuth('/asset_report/get', [
            'asset_report_token' => $assetReportToken,
            'include_insights' => $includeInsights,
        ]);
    }

    public function getAssetReportPdf($assetReportToken, $includeInsights = false)
    {
        return $this->client->postWithAuth('/asset_report/pdf/get', [
            'asset_report_token' => $assetReportToken,
            'include_insights' => $includeInsights,
        ]);
    }
}

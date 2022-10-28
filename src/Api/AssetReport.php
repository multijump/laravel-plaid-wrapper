<?php

namespace Mackensiealvarezz\Plaid\Api;

/**
 * @link https://plaid.com/docs/#assets
 */
class AssetReport extends Api
{
    public function create($accessTokens, $daysRequested, $options = [])
    {
        return $this->client->postWithAuth('/asset_report/create', [
            'access_tokens' => $accessTokens,
            'days_requested' => $daysRequested,
            'options' => $options,
        ]);
    }

    public function remove($assetReportToken)
    {
        return $this->client->postWithAuth('/asset_report/remove', [
            'asset_report_token' => $assetReportToken,
        ]);
    }

    public function createAuditCopy($assetReportToken)
    {
        return $this->client->postWithAuth('/asset_report/audit_copy/create', [
            'asset_report_token' => $assetReportToken,
        ]);
    }

    public function removeAuditCopy($auditCopyToken)
    {
        return $this->client->postWithAuth('/asset_report/audit_copy/remove', [
            'audit_copy_token' => $auditCopyToken,
        ]);
    }
}

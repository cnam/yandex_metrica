<?php

namespace YaM\Model;

use YaM\Core\Model;

class Monitoring extends Model
{

    /**
     * @var string
     */
    protected $enable_monitoring;

    /**
     * @var string
     */
    protected $emails;

    /**
     * @var string
     */
    protected $sms_allowed;

    /**
     * @var string
     */
    protected $enable_sms;

    /**
     * @var string
     */
    protected $sms_time;

    /**
     * @return string
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param string $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    }

    /**
     * @return string
     */
    public function getEnableMonitoring()
    {
        return $this->enable_monitoring;
    }

    /**
     * @param string $enable_monitoring
     */
    public function setEnableMonitoring($enable_monitoring)
    {
        $this->enable_monitoring = $enable_monitoring;
    }

    /**
     * @return string
     */
    public function getEnableSms()
    {
        return $this->enable_sms;
    }

    /**
     * @param string $enable_sms
     */
    public function setEnableSms($enable_sms)
    {
        $this->enable_sms = $enable_sms;
    }

    /**
     * @return string
     */
    public function getSmsAllowed()
    {
        return $this->sms_allowed;
    }

    /**
     * @param string $sms_allowed
     */
    public function setSmsAllowed($sms_allowed)
    {
        $this->sms_allowed = $sms_allowed;
    }

    /**
     * @return string
     */
    public function getSmsTime()
    {
        return $this->sms_time;
    }

    /**
     * @param string $sms_time
     */
    public function setSmsTime($sms_time)
    {
        $this->sms_time = $sms_time;
    }


} 
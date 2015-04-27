<?php  namespace Develpr\AlexaApp\Request; 

class IntentRequest extends BaseAlexaRequest
{
    private $intent = '';
    private $slots = [];

    protected function setupRequest(array $data)
    {
        $this->intent = array_get($data, 'request.intent.name');

        $this->slots = array_get($data, 'request.slots');

        if(!$this->slots)
            $this->slots = [];
    }

    /**
     * @return string
     */
    public function getIntent()
    {
        return $this->intent;
    }

    /**
     * @param $slotKey
     *
     * "slots": {
    "ZodiacSign": {
    "name": "ZodiacSign",
    "value": "virgo"
    }
    }
     *
     */
    public function token($slotKey)
    {
        return (array_key_exists($slotKey, $this->slots)) ? $this->slots[$slotKey] : null;
    }


} 
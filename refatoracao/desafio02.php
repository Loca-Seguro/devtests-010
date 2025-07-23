
<?php


// partindo do principio que devices eram a mesma classe com tipos diferentes, eu separei elas em varias classes
//e todas extendendo a classe DEVICE que tem um Id e um Type assim como tinha no pseudo código
//dessa forma para validar mais um dispositivo pelo DeviceMonitor basta criar uma nova classe extendendo o DEVICE
//e a enviando no array de objetos $devices
class DeviceMonitor
{
    public function check_status($devices): void
    {
        foreach ($devices as $device) {
            $alertMessage = $device->needsAlertMessage();

            if ($alertMessage !== null) {
                $this->alert($alertMessage);
            }
        }
    }

    public function alert($message): void
    {
        //aqui esta o echo, mas seria qualquer tipo de alerta que a plataforma utiliza
        echo "ALERT: " . $message . "\n";
    }
}


abstract class Device
{
    public $id;
    public $type;

    abstract public function needsAlertMessage(): ?string;
}

class Sensor extends Device
{
    public $battery_level;

    public function needsAlertMessage(): ?string
    {
        if ($this->battery_level < 20) {
            return "Battery low on sensor: " . $this->id;
        }
        return null;
    }
}

class Camera extends Device
{
    public function needsAlertMessage(): ?string
    {
        if (!$this->is_streaming()) {
            return "Camera offline: " . $this->id;
        }
        return null;
    }

    public function is_streaming(): bool
    {
        // logica para verificar se esta transmitindo
        return true;
    }
}

class DoorLock extends Device
{
    public $last_heartbeat;

    public function needsAlertMessage(): ?string
    {
        if ($this->last_heartbeat > 600 ) { // 10 minutos que coloquei em segundos
            return "Door lock unresponsive: " . $this->id;
        }
        return null;
    }
}

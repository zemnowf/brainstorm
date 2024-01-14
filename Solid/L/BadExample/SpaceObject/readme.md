Существует базовый класс ```SpaceObject```, который 
предоставляет метод получения всех спутников 
```php
    public function getSatellites(): array
    {
        return $this->satellites;
    }
```

Класс ```Comet``` нарушает LSP принцип, когда переопределяет
возвращаемое значение этого метода - допустим, возникла 
необходимость декларировать, что у кометы не может быть спутников

```php
class Comet extends SpaceObject
{
//...
    public function getSatellites(): array
    {
        return "Comet can not have any satellite";
    }

}
```

Нарушение принципа приводит к непредвиденным обстоятельствам.
Даже если нет строгой типизации, дальше ошибку выдаст функция
перебора потенциальных спутников космического объекта.

```php
class SatellitePrinter
{

    public static function printSatelliteNames(SpaceObject $spaceObject) {
        $satellitesNames = [];
        foreach ($spaceObject->getSatellites() as $satellite) {
            echo $satellite->getName();
        }
    }

}
```
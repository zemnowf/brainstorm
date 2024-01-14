Для соблюдения в нашем примере LSP требуется, чтобы
методы подтипов вели себя таким же образом, как и базовый тип

В классе ```Comet``` теперь метод ```getSatellites()``` будет
возвращать пустой массив, удовлетворяя условия, что комета не может
иметь спутники

```php
class Comet extends SpaceObject
{
//...
    
    public function getSatellites(): array
    {
        return []; 
    }

}
```

А там, где это потребуется, будет указываться, что космическое тело
не имеет спутников.

```php
class SatellitePrinter
{
    public static function printSatelliteNames(SpaceObject $spaceObject)
    {

        if (count($spaceObject->getSatellites())) {
            $satellitesNames = [];
            foreach ($spaceObject->getSatellites() as $satellite) {
                echo $satellite->getName();
            }
        } else {
            echo $spaceObject->getName() . ' has no satellites';
        }
    }

}
```
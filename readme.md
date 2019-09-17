# Ataccama PHP Utils
Bunch of helpful classes, interfaces, traits.
- **E-mail** (gives you domain of email)
- Person, **Name** (automatically separates first and last name)
- Comparator + interface Comparable
- Sorter (using our Comparable interface)
- Messenger, Message
- JWT encoding
- Pair, Array
- cached data storage (useful for complex repositories)
- interface Databaseable

## Using
### Databaseable
```
class DatabaseEntity implements Databaseable {

    /** @var int */
    protected $id;

    public function row(): array {
        return [
            "id" => $this->$id
        ];
    }
}
```
### Cached Data Storare
```
// your object
$object = new ObjectWithSerializableData();

// init our data storage
$cache = new DataStorage(__DIR__ . "/../tmp");

// init unique key of your object for our storage
$key = new Key($object->id, "some_prefix_of_your_repository");

// save/replace data
$cache->add($key, $object);

// load data
$objectFromCache = $cache->get($key);

// and if your data have changed, just call 'notifyChange', it will be erase object from cache
$cache->notifyChange($key);
```
**Hint:** It is very useful in complex repositories, when some data depend on other data and you are able to speed up whole system, because you load only changed data.
# Api oluşturma
## Request type:
get, post veya her ikisi için çalışmaktadır.

## Proces type ve işlevselliği:
bu seçenek ile verilerinizi almak mı yoksa, yeni ekleme veya düzenleme yapmak mı istediğinizi tanımlayabilirsiniz.

**UPDATE işlemleri:**
Update edilmek istenilen modelin primary key alanının **id** ismine sahip olduğu varsayılmıştır. Düzenlemek istediğiniz modelin id değerini request bilgileriniz ile göndermeniz gerekmektedir.

**INSERT işlemi**
Update ile beklenilen id değerinin olmaması durumun da gelen tüm istekler belirtilmiş model üzerinden yeni kayıt işlemi yapılır.

> **Set type** seçiminin **put** seçilmiş olması durumunda id parametresi boş değil ise güncelleme, boş ise yeni kayıt işlemi yapılır.
> **Set type** seçiminin **patch** seçilmiş olması durumunda sadece güncelleme işlemi yapılır, primary değeri zorunludur.
  

# Veri alma ve filitreleme

**Process type** get olarak ayarlanıp, verilerini görmek istediğiniz modeli seçmeniz durumun da karşınıza modelin kendi veri tabanı tablosundaki field listesi gelecektir. Modelden veri alma işlemlerinde şeçenekler alttaki gibidir.

## Field name
Api çağrısında görüntülenmesini istediğiniz field ismini işaretleyiniz.

## Equalization
Filitre uygulayacak alanları işaretleyiniz.

## Equalization Op.
Verileniz ile nasıl bir karşılaştırma ile filitre edileceğini belirtmeniz içindir, eşittir, eşit değildir, küçüktür vb. şeklinde operator seciçimi yapabilirsiniz.

## Equalization Val

Veri tabanınızdan veriler getirilirken, bu kısım da yazmış olduğunuz bilgilere göre filitrelenip gelecektir. Filitrelemenin aktif olması için aynı field alanındaki **Equalization** seçeneği işaretlenmiş olması gerekmektedir. Bu kısım için dinamik veya statik değerler belirtilebilinir, bu değerler sistem tarafın dan belirtilen sabit bir değişken, veya request olarak gönderdiğiniz parametrelerden herhangi biri, yada varsayılan bir değer, ataması yapılabilinir.
>Sistem değişkeni veya request bir parametreyi belirtmek için : ile başlayan bir değer giriniz. 

- **:currentTime** *//2018-05-02 20:31:43 aktif zaman*
- **:currentDate** *//2018-05-02 aktif zaman*
- **:ip** 192.168.1.168 *//aktif kullanıcının ip adresi*    

get, post gönderdiğiniz değerler arasından bir eşleme yapmak isterseniz, aynı şekilde : ile başlayan request index adını belirtebilirsiniz. 

**Örn:**
request url: htt**://octobercms.com/api/products/?**created_at**=2018-05-02&user_id=1&client_id=strornumber
istenilen bir istekte **:created_at** olarak belirtebilirsiniz bu sayede istek olarak gönderdiğiniz tarihi veri tabanınızdan filitre ederek o tarihteki kayıtları alabilirsiniz.

> : ile başlamayan bir değer girdiğinizde bu değer olduğu gibi işlenecektir. 
> eğer : **ile başlayan** bir koşulda filitreleme yapacak iseniz **\\:indexName** olarak girebilirsiniz, bu şekilde yazdığınız da aynen *:indexName* olarak işlem yürütülecektir.

## Sayfalama
Sayfalama özelliğinin kullanılabilmesi için form arayüzünde **Allow page substitution** seçeneğinin aktif olması gerekmektedir. 
Sayfalar arasında geçiş yapmak için post veya get isteğiniz de  **paginate** ismi ile sayfa numarasını gönderebilirsiniz. 
Api çağrısın da **paginate** kullanacak iseniz ve oluşturduğunuz api de token zorunlu ise **paginate** değerinizi de token oluştururken belirtmelisiniz.
> Token aktif apilerde yapacağınız tüm erişimler de, tüm istek parametrelerini **Signature** methodundan geçirmelisiniz.

# Güncelleme ve yeni kayıt
Her iki işlem içinde **Process type** set olarak ayarlanmalıdır. 
Process type set olarak ayarlı bir api çağrısı **id** değeri olmadan çağırılırsa yeni kayıt eklenir.

Güncelleme yapılması için **id** indexi olan bir değer göndermelisiniz, bu değer api içerisinde seçilmiş model  find methodu ile bulunacak kaydin **primary field** değeri olması gerekli.

## Table alanlarınıza değer atamak *(Set value) Request index*
Text alanlarında post veya get olarak gönderdiğiniz, tablo alanlarına gidecek olan değerlerin index isimleri olmalıdır. 
Boş bıraktığınız alanlar işlem görmeyecektir, bu nedenle boş bırakacağınız alanların null değer alabildiğinden emin olmalısınız.

`jsonable` alanlara veri gönderimi için `json_encode ` edilmiş bir veri gönderilmelidir

**Örn.:**
5 id değerine sahip kullanıcının username, email ve permöission alanlarını güncelleyelim.
```php
$postData = [
	"id" => 5,
	"username" => "Tufan",
	"email" => "name@mysite.com"
	"permission" => json_encode([
		"edit" => 1,
		"delete" => 0,
		"insert" => 1, 
	])
];
```

## Required alanların seçimi
Set edeceğiniz model için beklenen verilerin zorunlu olmasını ayarlayabilirsiniz. Required olarak işaretlenmiş bir field için api set 
çağrısında request index alanın da belirttiğiniz isim ile bir veri göndermelisiniz.
Eğer api içerisinde required olarak işaretlemediğiniz bir field için required hatasi alırsanız, bu alan model dosyanız da gerekli olduğu
içindir ve geri dönüş mesajında **from model validation** metni içerir

## Default value
insert veya güncelleme sırasında önceden sizin belirlediğiniz bir değeri set ettirebilirsiniz, bu alan için 
**:currentTime**, **:currentDate** ve **:ip** gibi dinamik değerleri de kullanabilirsiniz.

## Set Type
Insert veya update olması için **put** seçeneğini kullanabilirsiniz. **put** seçeneği seçili iken primary değeri gönderirseniz
update işlemi gerçekleşir. 
> **put** primary değeri varsa günceller, yoksa insert yapar.   
> **patch** zorunlu primary değeri gönderilmelidir, sadece update işlemi yapar. primary değeri gönderilmez ise hata döner.

## Post-processing reply
Set işlemi sonucu ne şekilde response göndereceğini belirtebilirsiniz. Kayıt sonrası request ile gelenlerin dışında model 
diğer attribute değerlerinide gönderebilirsiniz, gelen isteği aynayalabilirsiniz, veya sadece başarılı başarısız sonucuda 
"gönderebilirsiniz.

# Relations

Model dosyanızda belirttiğiniz 
* "hasOne" => "singular",
* "belongsTo" => "singular",
* "hasMany" => "plural",
* "belongsToMany" => "plural",
* "attachOne" => "singular",
* "attachMany" => "plural"

ilişki tiplerinizdeki tüm model bilgilerini seçmenizi ve göstermenizi sağlar. Her ilişki tipinde birden fazla olan model bilgilerinizin tamamını, seçiminize göre işlenir ve response olarak geri dönecek olan json datanıza eklenir. 


# Kullanıcı tanımlama ve erişebilirlilik
Rest api plugini kurulum sırasında ihtiyaç duyduğu **Rainlab User** plugini ile entegreli çalışmaktadır. Oluşturmuş olduğunuz api kayıtlarına erişmek ve işlem yapmak isteyen kullanıcıların, api içerisindeki kullanıcı sekmesinde eklenmesi gerekmektedir.

## User Settings
Api'ye erişmesini istediğiniz user bilgilerini Rainlan User plugini üzerinde, düzenleme veya yeni kullanıcı ekranında, **Restful sekmesi** içerisindeki alanları tercihlerinize göre girin.

|Name|Descriptions|
|----------------|------------------|
| **Client ID** : | Kullanıcının her isteği için göndermesi gereken kullanıcıya özgü bir değerdir.|
|**Secret Key** :| Kullanıcı her isteğine eklemesi gereken token değerini oluşturması için gizli anahtarı. Bu değer sadece token oluşturabilmek içindir ve isteklerde açık bir şekilde gönderilmemmelidir. | 
|**Daily Request Limit** :| Bir kullanıcı günlük kaç adet api isteği yapabileceğini belirtir. Kullanıcı sınırsız istek yapmasını isterseniz **0** değeri giriniz. |
|**Allowed Ip Adress** : | Kullanıcının api isteğinde bulunabileceği ip adresleri, Kullanıcı api erişiminde sahip olması gereken ip listesini girmelisiniz. Kullanıcının her yerden  erişmesini isterseniz **0.0.0.0** şeklinde ip tanımlaması ekleyebilirsiniz. |


## Erişebilirlilik
Herkese ait  *(Public)* işaretlenmemiş bir kaynak için token parametresinin gönderilmesi gerekli.

## Token oluşturma

Yerel yöntemler ile
```php
use RainLab\User\Models\User;
use Mavitm\Restful\Classes\Signature;

function getToken()
{
	$userSecret = User::find(1)->secret_key;
	$postData = [
		"id" => 5,
		"username" => "Tufan",
		"email" => "name@mysite.com"
		"permission" => json_encode([
			"edit" => 1,
			"delete" => 0,
			"insert" => 1, 
		])
	];
	return Signature::instance()->getSign($userSecret, $postData); //md5
}
```
**Request örneği**
`htt**://octobercms.com/api/products/?token={{__SELF__.getToken()}}&**user_id**=1&**client_id**=strornumber`


## Public api
Api ekleme ve düzenleme ekranında, user sekmesi içerisin de,   *(make public)* şeçeneğini işaretlenlediğiniz de kullanıcıların ilgili apiye ip ve token zorunluluğu olmadan erişim yapmasını sağlarsınız. Bu işlem sadece ip ve token kısıtlamasını kaldırır.
**Sistemde kayıtlı kullanıcı olmayanlar erişemez.**  erişim için user_id ve client_id değerleri herzaman için gereklidir.  
Herkese açık bir api kaynağı oluşturmak istiyorsanız, kendi belirlediğiniz bir kullanıcıyı apiye dahil edip, user_id ve client_id değerleri ile url oluşturup erişmek isteyen kullanıcılara dağıtabilirsiniz.

> **Puclic** işaretli apiler de    
>Token eklemeden istek atabilirsiniz.   
>htt**://octobercms.com/api/products/?**user_id**=1&**client_id**=strornumber

# Diğer diller ile token oluşturmak.
## Javascript
```javascript
    const md5 = require('blueimp-md5');
    
    function createParamsObject(obj, expectedKeys = []) {
        const newObj = obj instanceof Array ? [] : {};
        Object.keys(obj).forEach((key) => {
            if (expectedKeys.indexOf(key) === -1) {
                newObj[key] = obj[key];
            }
        });
        return newObj;
    }
    
    function sortObjectRecursive(obj) {
        const keys = Object.keys(obj).sort();
        const sortedObject = {};
        keys.forEach((key) => {
            const value = obj[key];
            if (value instanceof Object || value instanceof Array) {
                sortedObject[key] = sortObjectRecursive(value);
            } else {
                sortedObject[key] = value;
            }
        });
        return sortedObject;
    }
    
    function implodeRecursive(obj, separator = '') {
        let str = '';
        for (const key in obj) {
            if (!obj.hasOwnProperty(key)) {
                continue;
            }
            const value = obj[key];
            if (value instanceof Object || value instanceof Array) {
                str += implodeRecursive(value, separator) + separator;
            } else {
                str += value + separator;
            }
        }
        return str.substring(0, str.length - separator.length);
    }
    
    const exceptedParams = [
        'access-token',
        'auth',
        'channel',
        'clientId',
        'locale',
    ];
    const allParams = {};
    const secret = '';
    
    // 1. Remove excluded params
    const params = createParamsObject(allParams, exceptedParams);
    
    // 2. Sort
    const sortedObject = sortObjectRecursive(params);
    
    // 3. Join
    const strParams = implodeRecursive(sortedObject);
    
    // 4. md5
    const sign = md5(strParams + secret);
    
    // 5. Profit
    console.error('sign:', sign);
```

## Python
```python
    import hashlib
    from collections import OrderedDict
    
    
    def sort_od(od):
        res = OrderedDict()
        for k, v in sorted(od.items()):
            if isinstance(v, dict):
                res[k] = sort_od(v)
            else:
                res[k] = v
        return res
    
    
    def implode_recursive(arr):
        str_p = ''
    
        if isinstance(arr, dict):
            values = arr.values()
        else:
            values = arr
    
        for val in values:
            if isinstance(val, (list, tuple, dict)):
                str_p = str_p + str(implode_recursive(val)) + separator
            else:
                str_p = str_p + str(val) + separator
    
        return str_p[0:len(str_p) - len(separator)]
    
    exceptedParams = (
        'access-token',
        'auth',
        'channel',
        'clientId',
        'locale'
    )
    
    allParams = {
        'moneyType': 82,
        'amount': 100,
        'playerId': 74094,
        'locale': 'ru',
        'recursive': {
            'x': 3,
            'b': 2,
            'a': 1,
            'z': 4
        },
        'recursiveArray': [3, 2, 1, 4]
    }
    
    secret = ''
    separator = ''
    
    # 1. Remove
    params = {}
    for (key, value) in allParams.items():
        if key not in exceptedParams:
            params[key] = value
    
    # 2. Sort
    params = sort_od(params)
    
    # 3. Join
    strParams = implode_recursive(params)
    
    # 4. md5
    m = hashlib.md5()
    m.update(str(strParams + secret).encode('utf-8'))
    sign = m.hexdigest()
    
    # 5. Signature
    print(sign)
```

# Events
```php
Event::listen('mavitm.restful.beforeSet', function ($restfulClass, &$requestArray){});
Event::listen('mavitm.restful.afterSet', function ($restfulClass, $targetModel){});
Event::listen('mavitm.restful.beforeGet', function ($restfulClass, &$requestArray){});
Event::listen('mavitm.restful.afterGet', function ($restfulClass, &$responseData){});
```

event parametrelerin bazıları yukarıda & işareti olan değişkenler referans olarak geçmektedir. 
tetiklenme sırasın da bu değerleri değiştirir iseniz api sonraki islemleri sizin değiştirdiğiniz datalar ile yapacaktır.
Bunun amacı bazı modelleriniz de ek güvenlikler almak veya çıktıyı göndermeden önce bazı eklemeler veya düzenlemeler yapmak isteyebilirsiniz.

isterseniz api oluştururken **Special before event names** ve **Special after event names** alanlarına  aralar da , 
kullanarak tetiklenmesini istediğiniz başka event isimleride belirtebilirsiniz.   

**Örn.:  mavitm.product.get,mavitm.product.formatter**  

Special olarak belirttiğiniz eventlar işlem sırasın da normal eventlardan sonra çalışacaktır. 

# Route
Eğer isterseniz component dışında rotalar ile de api isteklerini cevaplayabilirsiniz.
**Örnek bir rota kodu:**

```php
Route::group(['prefix' => 'api'], function () {
    Route::post('{apiid}/{userid}/{clientid}', function ($apiid, $userid, $clientid){
        try
        {
            return (new Mavitm\Restful\Classes\Restful)->runApi($apiid, $userid, $clientid);
        }
        catch (\Exception $e)
        {
            return (new Mavitm\Restful\Classes\Restful)->failResponse(['msg'=>$e->getMessage(), 'code'=>400],400);
        }
    });
});
```

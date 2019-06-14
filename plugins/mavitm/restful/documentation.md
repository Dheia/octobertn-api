# Building the API

## Request types
It works for GET, POST or both.

## Process type ve functionality
With this option, you can define the op type whether you get the data or to insert new one (as well update).

**UPDATE Operations**
Assumed primary key of the subject model is **id** and you should send this id value with your params.

**INSERT Operation**
If not defined an **id** value, API will insert instead.

> If **Set type** option selected as **put** and id param is not empty than it will be update. Otherwise created new record.

> In case of **Set type** option selected as **patch**, only update will be take place and primary value is mandatory.

# Getting and filtering the data
If **Process type** is GET and you select a model, you should get column list of the model in database. The options are below:

## Field name
Mark the column name you want displayed in the API call.

## Equalization
Mark the column that will filter.

## Equalization Op.
It is for you to specify how to filter with your data; You can select operators like **equal**, **not equal**, **less than** and so on.

## Equalization Value
When data is retrieved from the database, it will be filtered according to the information you have written in this section. In order for the filtering to be active, the **Equalization** option in the same field must be selected. Dynamic or static values can be specified for this part. These values can be either a fixed variable specified by the system, or any of the parameters you send as a request, or a default value assignment.

> Enter a value that starts with **:** to specify a system parameter or a request parameter.

- **:currentTime** *//2018-05-02 20:31:43 active datetime*
- **:currentDate** *//2018-05-02 active date*
- **:ip** 192.168.1.168 *//active requester ip address*

If you want to match a value from the GET or POST values you send, you can specify the request index name starting with **:**

**For example:** Request Url: https://octobercms.com/api/products/?**:created_at**=2018-05-02&user_id=1&client_id=strornumber

You can define **:created_at** and so the date you specified will be filtered in query results.

> If you enter a value that does not begin with **:** this value will be treated as it is.

> if you want to filter on a condition that starts with **:**, you can enter it as **\\:indexName**, so you will also have *:indexName* as you write it.

## Pagination
For using pagination, it must be enabled **Allow page substitution** option on form interface.
You can send **paginate** parameter as page number in get or post request for paginating the results.
If you want to use **paginate** param in api call and token is mandatory in your API, you should define **paginate** value while generating the token.
> For all of your token enabled APIs parameters should pass through **Signature** method.

# Update and Create
In both processes **process type** should be set as SET.

If an API call set to process type SET and called without a **id** value, a new record will be added.

You must submit a value of **id** index to be updated. This value must be the value of the **primary field** in the API to be found by the selected model's find method.

## Assigning values to table fields *(Set value) Request index*
The values to be entered in the table fields that you send as POST or GET in the text fields must be index names. Fields that you leave blank will not be padded, so make sure that the fields you are leaving empty are nullable.

`json_encoded` data must be sent to` jsonable` fields to writing data.

**For example:**
We will update the username, email and permission fields of the user with id 5.

```php
$postData = [
    "id" => 5,
    "username" => "John",
    "email" => "john@example.com"
    "permission" => json_encode([
        "edit" => 1,
        "delete" => 0,
        "insert" => 1, 
    ])
];
```

## Selecting the Required Fields
You can set the mandatory data for the model to be set. In the api set call for a field marked "required", you must send a data with the name that you specified in the request with index field.
If you receive the "required" error for a field that you do not mark as required in the api, because this field is necessary from your model file and the return message contains the text **from model validation**

## Default Value
You can set a value that you previously specified during insert or update. You can also use dynamic values such as: **:currentTime**, **:currentDate** and **:ip** for this field.

## Set Type
You can use **put** to make the transaction insert or update. If you send the primary value while **put** selected, update takes place.
> **put** type does update if there is a primary value, otherwise it does insert.
> **patch** needs mandatory primary value and it only does update. The error is returned if the primary value is not sent.

## Post-processing Reply
You can specify how the respond with results from the set operation. After insert, you can also send model's other attribute values other than the values that come with request. You can also mirror the incoming request, or just send the failed response.

# Relations
In your Model class;

* "hasOne" => "singular",
* "belongsTo" => "singular",
* "hasMany" => "plural",
* "belongsToMany" => "plural",
* "attachOne" => "singular",
* "attachMany" => "plural"

This will allow you to select and view all model information in your relationship types. All of your model information, which is more than one in each relationship type, is processed according to your selection and added to the json data which will be returned as a response.

# User Identification and Accessibility
Rest API plugin is integrated with **Rainlab.User** plugin which is needed during installation. Users who wish to access and manipulate records of APIs that you have created must be added to the API in the users section of the API panel.

## User Settings
On the **Rainlab.User** plugin, edit or enter the user information you want to access the API in the **Restful tab** on the edit or new user screen, depending on your preferences.

|Name|Descriptions|
|----------------|------------------|
|**Client ID**| It is a user-specific value that the user should send for every request.|
|**Secret Key**| The secret key to create a token value that the user must add to every request. This value is only to be able to create a token and should not be sent explicitly on requests.| 
|**Daily Request Limit**| Specifies how many API requests a user can make per day. If you want the user to make unlimited requests, enter **0** values.|
|**Allowed Ip Adress**| You must enter the IP address that the user may request for APIs, the IP list that the user should have in API access. If you want the user to be able to access from anywhere, you can add an IP definition of **0.0.0.0**|

## Accessibility
Everyone needs to send the token parameter for a *(Public)* unmarked resource.

## Generating Tokens
With local methods:

```php
use RainLab\User\Models\User;
use Mavitm\Restful\Classes\Signature;

function getToken()
{
    $userSecret = User::find(1)->secret_key;
    $postData = [
        "id" => 5,
        "username" => "John",
        "email" => "john@example.com"
        "permission" => json_encode([
            "edit" => 1,
            "delete" => 0,
            "insert" => 1, 
        ])
    ];

    return Signature::instance()->getSign($userSecret, $postData); //md5
}
```

**Request sample**
`https://octobercms.com/api/products/?token={{ __SELF__.getToken() }}&**user_id**=1&**client_id**=strornumber`

## Public API
When you mark the *(make public)* option in the user interface on the Add and Edit APIs screen, you allow users to access the relevant API without IP and token obligation. This removes only the IP and token constraint. **Non-registered users can not access the API**. The user_id and client_id values are always required for access. 

If you want to create an explicit API resource, you can include a user you specify yourself in the API and distribute it to users who want to create and access the url with user_id and client_id values.

> On **Public** flagged APIs, you can send a request without Token.
> https://octobercms.com/api/products/?**user_id**=1&**client_id**=strornumber

# Create token with other languages
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
Some of the event parameters above referenced as & symbol.
If you change this variables data while Event triggering, next functions on same variable will be use new datas.
This usage case is suitable for your alteration or modification needs of data for these variables.

If you want to trigger another events, you can put comma (,) between **Special before event names** and **Special after event names** fields while creating API.

**Example:  mavitm.product.get,mavitm.product.formatter**  

Special events will be triggered after normal events.

# Route
If you want, you can also handle api requests with the routes.
**Sample route definition**

```php
Route::group(['prefix' => 'api'], function () {
    Route::post('{apiid}/{userid}/{clientid}', function ($apiid, $userid, $clientid) {
        try
        {
            return (new Mavitm\Restful\Classes\Restful())->runApi($apiid, $userid, $clientid);
        }
        catch (\Exception $e)
        {
            return (new Mavitm\Restful\Classes\Restful())->failResponse(['msg' => $e->getMessage(), 'code' => 400], 400);
        }
    });
});
```

import urllib.request
import json

from file_names import *
from file_utils import append_to_file

if __name__ == '__main__':
    print('Loading list of groups to file \'' + GROUPS_FILE_NAME + '\'')
    limit = 100
    offset = 0
    counter = 0
    while True:
        url = "http://api.rozklad.org.ua/v2/groups/?filter={'limit':" + str(limit) + ",'offset':" + str(offset) + "}"

        req = urllib.request.Request(url)
        resp = urllib.request.urlopen(req)
        resp_data = resp.read()

        data = json.loads(resp_data.decode('utf-8'))
        data = data['data']

        if data is None: break

        for group in data:
            group_full_name = group['group_full_name']
            group_id = group['group_id']
            counter += 1
            try:
                print("{}) {}".format(counter, group_full_name))
            except UnicodeEncodeError:
                print(str(counter) + ")\t" + "UnicodeEncodeError")

            append_to_file(GROUPS_FILE_NAME, (str(group_id) + '.' + group_full_name + '\n'))

        offset += limit

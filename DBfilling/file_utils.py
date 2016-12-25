def append_to_file(file_name, string):
    with open(file_name, 'a') as f:
        f.write(string + '\n')


def is_unique_in_file(file, string):
    with open(file) as f:
        for line in f.readlines():
            if line.strip() == string.strip():
                return False
    return True

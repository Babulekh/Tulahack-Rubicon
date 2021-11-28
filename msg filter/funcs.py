import os

# загрузка словаря
def get_dict(dict_path):
    dictionary = set()
    with open(dict_path, 'r', encoding='utf-8') as dict_file:
        for line in dict_file:
            dictionary.add(line)
    return dictionary


# поиск слова, или похожего на него, в словаре
def check_dict(word, dictionary):
    equal_part = 0.6
    for dict_word in dictionary:
        count = 0
        for i in range(min(len(word), len(dict_word))):
            if word[i] == dict_word[i]:
                count += 1
        if count / max(len(word), len(dict_word)) >= equal_part:
            return True
    return False

# удаление временных чанков
def clear_chunks(chunk_paths):
    for chunk_path in chunk_paths:
        if os.path.isfile(chunk_path):
            os.remove(chunk_path)

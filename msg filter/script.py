import sys

# перевод звука в текст
import speech_recognition as sr
# обработка звука
from pydub import AudioSegment
from pydub.silence import split_on_silence
# обработка в несколько потоков
from multiprocessing import Pool

# pip install SpeechRecognition
# pip install pydub

# работа скрипта основана на библиотеке SpeechRecognition распознавания слов в аудио
# для корректной работы с русским языком необходимо скачать и настроить аккустическую модель русского языка
# в связи с большим размером модели цензурирование занимает некоторое время
# точность также зависит от качества записанного голоса на аудиодорожке

# использование python script.py <путь к .wav> <путь к dict.txt>

from funcs import get_dict, check_dict, clear_chunks

# настройки
min_silence_len = 10
silence_thresh = -45
workers = 4

# путь к аудиофайлу
audio_file_path = sys.argv[1]
# путь к словарю
dictionary = sys.argv[2]
# загрузить словарь
censor_dict = get_dict(dictionary)

r = sr.Recognizer()


# поиск текста в чанке аудиофайла
def analize_chunk(chunk_path):
    with sr.AudioFile(chunk_path) as af:
        audio = r.record(af)
    try:
        line = set(r.recognize_sphinx(audio, language="ru-RU").split())
    except sr.UnknownValueError:
        pass
    else:
        for word in line:
            if check_dict(word.lower(), censor_dict):
                return None
        return chunk_path


def main():
    # разбивка звука по тишине
    audio_file = AudioSegment.from_wav(audio_file_path)
    audio_chunks = split_on_silence(audio_file, min_silence_len=min_silence_len, silence_thresh=silence_thresh)

    chunk_paths = []
    # сохранение чанка аудиофайла
    for i, chunk in enumerate(audio_chunks):
        chunk_path = f'chunk{i}_{audio_file_path}'
        chunk_paths.append(chunk_path)
        chunk.export(chunk_path, format='wav')
    # обработка чанка
    with Pool(workers) as e:
        audio_segments = list(e.map(analize_chunk, chunk_paths))
    audio_segments = [segment for segment in audio_segments if segment is not None]
    audio_segments.sort()
    # склеивание цензуренных чанков в цельный файл
    final_audio = AudioSegment.empty()
    for segment in audio_segments:
        final_audio = final_audio.append(AudioSegment.from_wav(segment), crossfade=0)
    final_audio.export(f'censored_{audio_file_path}', format="wav")
    # очистка чанков
    clear_chunks(chunk_paths)


if __name__ == '__main__':
    main()

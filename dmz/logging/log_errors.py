import logging

logger = logging.getLogger('my_app')
logger.setLevel(logging.INFO)

fh = logging.FileHandler('log.txt')
fh.setLevel(logging.INFO)
logger.addHandler(fh)


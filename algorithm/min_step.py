x = int(input('enter integer x: '))
y = int(input('enter integer y: '))

def x_nho_y (x,y):
    step =0
    if x==y:
        step=2
        logs='*'
    else:
        if y%2 ==0:
            n=int(x-y/2)
            logs='-'*n+'*'
            step=step+ n+1
            print('step',step)
        else:
            n=int(x-(y+1)/2)
            logs='-'*n+'*-'
            step=n+2
    return step,logs


def find_number_step(x,y):
    
    step_all=0
    nhan=0
    tru=0
    logs=''
    logs_all=''
        
    while( 1 ):
        if(2*x >= y and y>=x):
            break
        if y%2 ==1 :
            y=y+1
            tru=1
            step_all=step_all+1
        else:
            tru=0
        y=int(y/2)
        step_all=step_all+1
        nhan=1
        logs=logs+'*'*nhan+'-'*tru

    step,logs_all=x_nho_y(x,y)
    step_all=step_all+step
    logs_all=logs_all + logs
    return step_all, logs_all


steps,log=find_number_step(x,y)
print('step',steps)
print('logs',log)